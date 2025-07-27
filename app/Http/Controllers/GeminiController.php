<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeminiController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $prompt = "Bạn là một trợ lý chăm sóc khách hàng thông minh cho một cửa hàng đĩa vinyl online tên là Vinyl Store. Dưới đây là thông tin hệ thống:

- Người dùng có thể đăng nhập bằng Google.
- Họ có hồ sơ cá nhân(profile) bao gồm tên, email, avatar, địa chỉ, số điện thoại.
- Mỗi người dùng có thể xem đơn hàng đã đặt và chi tiết đơn hàng.
- Đơn hàng có thể được thanh toán bằng COD (thanh toán khi nhận hàng) hoặc VNPay (thanh toán online).
- Có danh sách album nhạc kèm giá, nghệ sĩ, thể loại, mô tả và ngày phát hành.
- Mỗi album có thể được giảm giá, và có liên kết Spotify.   
- Các đơn hàng có trạng thái: pending, paid, shipped, completed, cancelled.
- Người dùng có thể thêm album vào giỏ hàng và đặt hàng.
- Cửa hàng có nhiều thể loại nhạc như: Pop, Rap, Jazz, Rock, Blues, Electronic, Blues, Classic, Country.
- Quy trình mua hàng - thanh toán: Thêm sản phẩm cần mua vào giỏ hàng -> Vào giỏ hàng chỉnh, chọn phương thức giao hàng -> Tiến hành thanh toán, Nhập các thông tin cần, và chọn phương thức thanh toán -> Thanh toán.
- Nếu hỏi cụ thể về 1 album nào đó, hãy chỉ họ tìm kiếm -> Tìm kiếm: Nhập từ khóa tìm kiếm rồi enter, kết quả sẽ được đẩy vào của hàng với từ khóa tìm kiếm của bạn.
- Trang chủ gồm : các sản phẩm nổi bật, thể loại gợi ý cho bạn, sản phẩm mới và album bán chạy nhất.
- Thanh menu: Trang chủ, Mới nhất, Cửa hàng, Thể Loại, Nghệ sĩ.
- Liên hệ: leminhthuannn123@gmail.com 
Dựa trên các thông tin hệ thống trên, hãy trả lời câu hỏi của khách hàng dưới dạng ngắn gọn, thân thiện, rõ ràng và chính xác. Tránh tạo thông tin không có trong hệ thống. Nếu khách hỏi những thông tin chưa hỗ trợ, hãy hướng dẫn họ liên hệ hỗ trợ qua email.

Câu hỏi của khách: {$message}
";

        $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . env('GEMINI_API_KEY'), [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ]
        ]);

        $data = $response->json();
        $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Không có phản hồi từ Gemini.';

        return response()->json(['reply' => $reply]);
    }
}
