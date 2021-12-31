@if (!empty($data['department_products']))
<h4><strong>Văn phòng phẩm dùng chung:</strong></h4>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" width="15%">STT</th>
      <th scope="col" width="65%">Tên vật dụng</th>
      <th scope="col" width="20%">Số lượng</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data['department_products'] as $product_id => $product)  
    <tr>
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $data['products'][$product_id] }}</td>
      <td>{{ $product['quantity'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@if (!empty($data['personal_products']))
<h4><strong>Văn phòng phẩm dùng riêng:</strong></h4>
<table class="table table-bordered">
  <thead>
    <tr>
        <th scope="col" width="15%">STT</th>
      <th scope="col" width="65%">Tên vật dụng</th>
      <th scope="col" width="20%">Số lượng</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data['personal_products'] as $product_id => $product)  
    <tr>
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $data['products'][$product_id] }}</td>
      <td>{{ $product['quantity'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif 