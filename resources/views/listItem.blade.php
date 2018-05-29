<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>List Item</h2>
        <a href="DeleteAll" class="btn btn-danger">Delete All</a>
        <a href="importExport" class="btn btn-primary">Import (.csv)</a>
        <br>
        <br>
        <form action="del" method="post">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $product)
                <tr>
                    <td><input type="checkbox" name="delid[]" value="{{$product->id}}"></td>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>                    
                    <td>
                        <a href="#"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-trash" style="color: red; padding-left: 10px;"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-eye-open" style="color: orange; padding-left: 10px;"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <button type="submit" class="btn btn-danger">Delete Selected</button>
        </form>
        
    </div>
</body>

</html>