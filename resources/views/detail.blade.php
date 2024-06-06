<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
    margin: auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>


<ul style="width:85%;margin:0 auto 50px auto;list-style:none;">
  <li>
    <strong>Id : </strong>
    <span>{{ $post->id }}</span>
</li>
  <li>
    <strong>Title : </strong>
    <span>{{ $post->title }}</span>
</li>
  <li>
    <strong>Body : </strong>
    <span>{{ $post->body }}</span>
  </li>
</ul>

<table>
  <tr>
    <th>Comment Id</th>
    <th>Title(name)</th>
    <th>Email</th>
    <th>Body</th>
    <th>Action</th>
  </tr>
  @foreach($comments as $comment)
  <tr>
    <td>{{ $comment->id }}</td>
    <td>{{ $comment->name }}</td>
    <td>{{ $comment->email }}</td>
    <td>{{ $comment->body }}</td>
    <td><a href="javascript:void(0);" class="send" data-msg="{{ $comment->body }}" style="padding:10px;background:red;color:#fff;">Send</a></td>
  </tr>
  @endforeach
</table>
<script>
  $(document).ready(function(){
    $(".send").click(function(){
       var message =  $(this).data('msg');
      // alert(message);
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
       $.ajax({
            type:'POST',
            url: "{{ route('telegram.send') }}",
            data: {msg:message},
            success: (response) => {
              console.log(response);
              if(response.ok){
                alert('Message sent successfully');
              }else{
                alert('Something went wrong!!!');
              }
                
              
            },
            error: function(response){
             alert('Something went wrong!!!');
            }
        });
      });
    });
  </script>
</body>
</html>


