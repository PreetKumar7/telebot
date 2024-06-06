
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

<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Comments Count</th>
  </tr>
  @foreach($list as $comments)

  <tr>
    <td><a href="list-detail/{{ $comments->id }}">{{ $comments->id }}</a></td>
    <td>{{ $comments->title }}</td>
    <td>{{ $comments->count }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>


