<div>
<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Add New Products</div>

                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Products </a>
                            </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="add_Product">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Product Name</label>
                            <div class="col-md-4">
                                <input type="text"  class="form-control input-md" placeholder="Product Name" wire:model="name" wire:keyup="generate_slug"/>
                                @error('name') <small class="text-danger"> {{$message}}</small> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"> Product Slug</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Product Slug" wire:model="slug"/>
                                @error('slug') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"> Short Description</label>
                            <div class="col-md-4" wire:ignore>
                                <textarea class="form-control" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                @error('short_description') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"> Description</label>
                            <div class="col-md-4" wire:ignore>
                                <textarea class="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                                @error('description') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"> Regular Price</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Regular Price" wire:model="regular_price"/>
                                @error('regular_price') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"> Sale Price</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Sale Price" wire:model="sale_price"/>
                                @error('sale_price') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"> SKU</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="SKU" wire:model="SKU"/>
                                @error('SKU') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"> Stock</label>
                            <div class="col-md-4">
                                <select class="form-control"wire:model="stock_status"  >
                                      <option value="instock">In Stock</option>
                                      <option value="outofstock">Out of Stock</option>
                                </select>
                                @error('stock_status') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" wire:model="featured"> Featured</label>
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Quantity" wire:model="quantity"/>
                                @error('quantity') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Product Image</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" wire:model="image"/>
                               @if($image)
                                   <img src="{{$image->temporaryUrl()}}" width="120" class="pull-right"/>
                                   @endif
                                @error('image') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>



                        </div><div class="form-group">
                            <label class="col-md-4 control-label">Product Gallery</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" wire:model="images" multiple/>
                               @if($images)
                                   @foreach($images as $image)
                                   <img src="{{$image->temporaryUrl()}}" width="120" class="pull-right" />
                                    @endforeach
                                   @endif
                                @error('images') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"> Category</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                </select>
                                @error('category_id') <small class="text-danger"> {{$message}}</small> @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button class="btn btn-primary" style="margin-left: 150px; margin-top: 20px ">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@push('scripts')
    <script>
        $(function () {
            tinymce.init({
               selector :'#short_description',
                setup :function (editor) {
                    editor.on('Change' ,function (e) {
                     tinyMCE.triggerSave();
                     var sd_data=$('#short_description').val();
                     @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector :'#description',
                setup :function (editor) {
                    editor.on('Change' ,function (e) {
                        tinyMCE.triggerSave();
                        var d_data=$('#description').val();
                    @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
    @endpush
