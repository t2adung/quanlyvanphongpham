
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
    @foreach ($data['products'] as $product_id => $product_name)  
    <tr>
        <th scope="row">{{ $product_name }}</th>
        @foreach ($data['users'] as $user_id => $name) 
          @php
            $user_quantity = isset($data['data'][$user_id][$product_id]) ? $data['data'][$user_id][$product_id] : 0;
          @endphp
            <td>{{ $user_quantity }}</td>
        @endforeach
    </tr>
    @endforeach
    <tr>
        <th scope="row" style="">Ghi chú</th>
        @foreach ($data['users'] as $user_id => $name) 
        <td>
          @php
            $description = isset($data['descriptions'][$user_id]) ? $data['descriptions'][$user_id] : "";
          @endphp
          {{ $description }}
        </td>
        @endforeach
    </tr>
  </tbody>
</table>