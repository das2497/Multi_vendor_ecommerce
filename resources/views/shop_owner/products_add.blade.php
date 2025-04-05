<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('shop/images/logo.jpg') }}" type="image/ico" />

  <title>Mr. Delivery</title>

  <!-- Bootstrap -->
  <link href="{{asset('super_admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('super_admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{asset('super_admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{asset('super_admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="{{asset('super_admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{asset('super_admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="{{asset('super_admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{asset('super_admin/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      <!-- sidebar -->
      @include('shop_owner.components.sidebar')
      <!-- /sidebar -->

      <!-- top navigation -->
      @include('shop_owner.components.header')
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row">
          <!-- ============================================================== -->

          <!-- ============================================================== -->

          <!-- recent orders  -->
          <!-- ============================================================== -->
          <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- top perfomimg  -->
            <!-- ============================================================== -->
            <div class="card">
              <h5 class="card-header">Add Product</h5>
              <div class="card-body p-0">
                <form action="{{route('shop_owner.add_product_save')}}" method="POST" enctype="multipart/form-data" class="p-2">
                  @csrf
                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="file1" class="col-form-label">Product image 1</label>
                    <input name="file1" id="file1" type="file" class="form-control" value="{{old('file')}}">
                  </div>
                  <div class="form-group">
                    <label for="file2" class="col-form-label">Product image 2</label>
                    <input name="file2" id="file2" type="file" class="form-control" value="{{old('file')}}">
                  </div>
                  <div class="form-group">
                    <label for="file3" class="col-form-label">Product image 3</label>
                    <input name="file3" id="file3" type="file" class="form-control" value="{{old('file')}}">
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-form-label">Product Name</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Shop Category Name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-form-label">Product Description</label>
                    <input name="description" id="description" type="text" class="form-control" placeholder="Shop Category Description" value="{{old('description')}}">
                  </div>
                  <div class="form-group">
                    <label for="category" class="col-form-label">Product Category</label>
                    <select name="category" id="category" class="form-control">
                      <option value="">Select Category</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->name}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sub_category" class="col-form-label">Product Sub Category</label>
                    <select name="sub_category" id="sub_category" class="form-control">
                      <option value="">Select Sub Category</option>
                      @foreach ($sub_categories as $category)
                      <option value="{{$category->name}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="price" class="col-form-label">Price</label>
                    <input name="price" id="price" type="text" class="form-control" placeholder="Price" value="{{old('price')}}">
                  </div>
                  <div class="form-group">
                    <label for="qty" class="col-form-label">Quantity</label>
                    <input name="qty" id="qty" type="text" class="form-control" placeholder="Quantity" value="{{old('price')}}">
                  </div>
                  <div class="form-group">
                    <label for="brand" class="col-form-label">Brand</label>
                    <input name="brand" id="brand" type="text" class="form-control" placeholder="Brand" value="{{old('brand')}}">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- end top perfomimg  -->
            <!-- ============================================================== -->
          </div>
          <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
              @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
              @endif
              <h5 class="card-header">All Shop Categories</h5>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="bg-light">
                      <tr class="border-0">
                        <th class="border-0">#</th>
                        <th class="border-0">Image</th>
                        <th class="border-0">Name</th>
                        <th class="border-0">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $product)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('assets/images/products/'.$product->img1) }}" alt="image"
                            style="width: 50px; height: 50px;"></td>
                        <td>{{ $product->name }}</td>
                        <td>
                          <Button class="btn btn-outline-success" data-toggle="modal" data-target="#updateModal{{ $product->id }}">Update</Button>
                          <Button class="btn btn-outline-danger">Delete</Button>
                        </td>
                      </tr>

                      <!-- Update Modal -->
                      <div class="modal fade" id="updateModal{{ $product->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="updateModalLabel{{ $product->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <form action="" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel{{ $product->id }}">Update Product</h5>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="name">Product Name</label>
                                  <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                                </div>
                                <div class="form-group">
                                  <label for="description">Description</label>
                                  <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="category">Select Category</label>
                                  <select class="form-control" id="category" name="category_id" required>
                                    <option value="">Select Category</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="sub_category">Select Sub Category</label>
                                  <select class="form-control" id="sub_category" name="sub_category_id" required>
                                    <option value="">Select Sub Category</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="price">Price</label>
                                  <input type="text" class="form-control" name="price" value="{{ $product->price }}" required>
                                </div>
                                <div class="form-group">
                                  <label for="qty">Quantity</label>
                                  <input type="text" class="form-control" name="qty" value="{{ $product->qty }}" required>
                                </div>
                                <div class="form-group">
                                  <label for="brand">Brand</label>
                                  <input type="text" class="form-control" name="brand" value="{{ $product->brand }}" required>
                                </div>
                                <div class="form-group">
                                  <label for="img1">Item Image 1</label>
                                  <input type="file" class="form-control" name="img1">
                                </div>
                                <div class="form-group">
                                  <label for="img2">Item Image 2</label>
                                  <input type="file" class="form-control" name="img2">
                                </div>
                                <div class="form-group">
                                  <label for="img3">Item Image 3</label>
                                  <input type="file" class="form-control" name="img3">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      @endforeach
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- end recent orders  -->

        </div>
      </div>
      <!-- /page content -->

    </div>
  </div>

  <!-- jQuery -->
  <script src="{{asset('super_admin/vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('super_admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('super_admin/vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{asset('super_admin/vendors/nprogress/nprogress.js')}}"></script>
  <!-- Chart.js -->
  <script src="{{asset('super_admin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
  <!-- gauge.js -->
  <script src="{{asset('super_admin/vendors/gauge.js/dist/gauge.min.js')}}"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{asset('super_admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('super_admin/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Skycons -->
  <script src="{{asset('super_admin/vendors/skycons/skycons.js')}}"></script>
  <!-- Flot -->
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.js')}}"></script>
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.time.js')}}"></script>
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.stack.js')}}"></script>
  <script src="{{asset('super_admin/vendors/Flot/jquery.flot.resize.js')}}"></script>
  <!-- Flot plugins -->
  <script src="{{asset('super_admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
  <script src="{{asset('super_admin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
  <script src="{{asset('super_admin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
  <!-- DateJS -->
  <script src="{{asset('super_admin/vendors/DateJS/build/date.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('super_admin/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
  <script src="{{asset('super_admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('super_admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{asset('super_admin/vendors/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('super_admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{asset('super_admin/build/js/custom.min.js')}}"></script>

</body>

</html>