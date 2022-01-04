
@if (!empty($data['department_products']))
<h4><strong>Văn phòng phẩm dùng chung:</strong></h5>
<table class="table table-bordered report_table">
  <thead>
    <tr>
        <th scope="col"></th>
        @foreach ($data['users'] as $user_id => $name) 
            <th scope="col">{{ $name }}</th>
        @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($data['dept_products_arr'] as $product_id => $product_name)  
    <tr>
        <th scope="row">{{ $product_name }}</th>
        @foreach ($data['users'] as $user_id => $name) 
          @php
            $user_quantity = isset($data['department_products'][$user_id][$product_id]) ? $data['department_products'][$user_id][$product_id] : 0;
          @endphp
          @if ($user_quantity > 0)
            <td style="background-color: #ebc7c6;">{{ $user_quantity }}</td>
          @else
            <td>{{ $user_quantity }}</td>
          @endif 
        @endforeach
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@if (!empty($data['personal_products']))
<h4><strong>Văn phòng phẩm dùng riêng:</strong></h3>
<table class="table table-bordered report_table">
<thead>
    <tr>
        <th scope="col"></th>
        @foreach ($data['users'] as $user_id => $name) 
            <th scope="col">{{ $name }}</th>
        @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($data['per_products_arr'] as $product_id => $product_name)  
    <tr>
        <th scope="row">{{ $product_name }}</th>
        @foreach ($data['users'] as $user_id => $name)  
          @php
            $user_quantity = isset($data['personal_products'][$user_id][$product_id]) ? $data['personal_products'][$user_id][$product_id] : 0;
          @endphp
          @if ($user_quantity > 0)
            <td style="background-color: #ebc7c6;">{{ $user_quantity }}</td>
          @else
            <td>{{ $user_quantity }}</td>
          @endif 
        @endforeach
    </tr>
    @endforeach
  </tbody>
</table>
@endif