<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Pesanan;

class PaymentController extends Controller
{
    public function createPaymentLink($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Payload data transaksi
        $payload = [
            'transaction_details' => [
                'order_id' => 'order-' . $pesanan->id,
                'gross_amount' => $pesanan->harga,
            ],
            'customer_details' => [
                'first_name' => $pesanan->namaClient,
                'email' => $pesanan->emailClient,
                'phone' => $pesanan->teleponClient,
            ],
            'item_details' => [
                [
                    'id' => $pesanan->id,
                    'price' => $pesanan->harga,
                    'quantity' => 1,
                    'name' => $pesanan->nama_produk,
                ],
            ],
        ];

        // Kirim permintaan ke Midtrans
        $client = new Client();
        try {
            $response = $client->post('https://api.sandbox.midtrans.com/v2/payments', [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode(config('midtrans.server_key') . ':'),
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload,
            ]);

            $responseBody = json_decode($response->getBody(), true);

            // Dapatkan Payment Link
            $paymentLink = $responseBody['redirect_url'];

            return view('payments.payment-link', compact('paymentLink', 'pesanan'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function handlePaymentNotification(Request $request)
{
    $payload = $request->all();
    $orderId = $payload['order_id'];
    $transactionStatus = $payload['transaction_status'];

    $pesananId = str_replace('order-', '', $orderId);
    $pesanan = Pesanan::findOrFail($pesananId);

    if ($transactionStatus == 'settlement') {
        $pesanan->status_pembayaran = 'Paid';
    } elseif ($transactionStatus == 'pending') {
        $pesanan->status_pembayaran = 'Pending';
    } elseif ($transactionStatus == 'deny' || $transactionStatus == 'expire') {
        $pesanan->status_pembayaran = 'Failed';
    }

    $pesanan->save();
    return response()->json(['message' => 'Payment status updated']);
}

}
