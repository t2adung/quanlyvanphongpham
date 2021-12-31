<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
        <colgroup>
          <col >
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
        </colgroup>
        <tbody>
          <tr>
            <td style="text-align:center" colspan="5">NGÂN HÀNG NHÀ NƯỚC</td>
            <td style="text-align:center" colspan="2">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="text-align:center" colspan="5">VIỆT NAM</td>
            <td style="text-align:center; text-decoration: underline;" colspan="2">Độc lập - Tự do - Hạnh phúc</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="text-align:center" colspan="5">CHI NHÁNH TP. HỒ CHÍ MINH</td>
            <td colspan="2"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="text-align:center; text-decoration: underline;" colspan="5">PHÒNG KẾ TOÁN - THANH TOÁN</td>
            <td colspan="2"></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="5"></td>
            <td style="font-style:italic; text-align: right" colspan="2">Thành phố Hồ Chí Minh, ngày __ tháng __  năm __  </td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="10">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="10">&nbsp;</td>
          </tr>
          <tr class="row8">
            <td></td>
            <td style="text-align:center; font-weight: bold" colspan="6">GIẤY ĐỀ NGHỊ </td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align:center; font-weight: bold" colspan="6">(Xin mua văn phòng phẩm)</td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align:center;" colspan="6">Kính gửi: Phòng Hành chính - Nhân sự</td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align:center;" colspan="6">Phòng Kế toán – Thanh toán có nhu cầu sử dụng VPP trong tháng {{ $data['month'] }}/{{ $data['year'] }} như sau:</td>
            <td colspan="3"></td>
          </tr>
          @if (!empty($data['department_products']))
          <tr>
            <td></td>
            <td colspan="6">1. Văn phòng phẩm dùng chung:</td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight: bold">STT</td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important;font-weight: bold" colspan="3">TÊN VẬT DỤNG</td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important;font-weight: bold">SỐ LƯỢNG</td>
            <td colspan="3"></td>
          </tr>
          @foreach ($data['department_products'] as $product_id => $product)  
          <tr>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important;">{{ $loop->index + 1 }}</td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important;"colspan="3">{{ $data['products'][$product_id] }}</td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important;">{{ $product['quantity'] }}</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          @endforeach
          @endif
          @if (!empty($data['personal_products']))
          <tr>
            <td></td>
            <td colspan="6">2. Văn phòng phẩm cá nhân:</td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight: bold">STT</td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight: bold" colspan="3">TÊN VẬT DỤNG</td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight: bold">SỐ LƯỢNG</td>
            <td colspan="3"></td>
          </tr>
          @foreach ($data['personal_products'] as $product_id => $product)  
          <tr>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important;">{{ $loop->index + 1 }}</td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important;" colspan="3">{{ $data['products'][$product_id] }}</td>
            <td style="border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important;">{{ $product['quantity'] }}</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          @endforeach
          @endif
          <tr>
            <td colspan="10"></td>
          </tr>
          <tr>
            <td></td>
            <td colspan="6">Đề nghị Phòng Hành chính – Nhân sự (Tổ Hành chính – Văn thư) mua cấp để Phòng Kế toán – Thanh toán sử dụng trong công tác.</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="10"></td>
          </tr>
          <tr>
            <td colspan="5"></td>
            <td colspan="2" style="font-weight: bold; text-align: center">TRƯỞNG PHÒNG</td>
            <td colspan="3"></td>
          </tr>
          <tr>
          <td colspan="10">&nbsp;</td>
          </tr>
          <tr>
          <td colspan="10">&nbsp;</td>
          </tr>
          <tr>
          <td colspan="10">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5"></td>
            <td colspan="2" style="font-weight: bold; text-align: center">Lâm Ngọc Thủy</td>
            <td colspan="3"></td>
          </tr>
        </tbody>
    </table>