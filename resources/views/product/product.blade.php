@extends('layouts.main')
@push('css')
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">



@endpush
@push('css')
<style>
    .upload__box {
        padding: 40px;
      }
      .upload__inputfile {
        width: 100%;
        height: 0.1px;
        opacity: 0;

        position: absolute;
        z-index: -1;
      }
      .upload__btn {
        display: inline-block;
        font-weight: 600;
        color: #fff;
        text-align: center;
        min-width: 116px;
        padding: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid;
        background-color: #4045ba;
        border-color: #4045ba;
        border-radius: 10px;
        line-height: 26px;
        font-size: 14px;
      }
      .upload__btn:hover {
        background-color: unset;
        color: #4045ba;
        transition: all 0.3s ease;
      }
      .upload__btn-box {
        margin-bottom: 10px;
      }
      .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
      }
      .upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-bottom: 12px;
      }
      .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
      }
      .upload__img-close:after {
        content: "✖";
        font-size: 14px;
        color: white;
      }

      .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
      }
</style>

@endpush
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Product List
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">select option</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="subcategory">Sub Category</label>
                            <select name="subcategory_id"  class="form-control" id='subcategory'>
                                <option value="">select option</option>
                                @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="brand">Brand Name:</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">select option</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="productname">Product Name:</label>
                           <input type="text" name="product_name" id="product" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="price">Product Price:</label>
                           <input type="number" name="price" id="price" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="discount">Discount:</label>
                           <input type="number" name="discount" id="discount" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="tags">Tags:</label>
                           <input type="text" name="tags[]"  class="form-control"  id="input-tags">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="shor_desp">Short Description:</label>
                            <textarea type='text' name="short_desp"  cols="30" rows="10" class="form-control"></textarea>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="long">Long Description:</label>
                            <textarea type='text' name="long_desp" id="long_desp" cols="30" rows="10" class="form-control"></textarea>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="shoret">Additional Information:</label>
                            <textarea type='text' name="additional_information" id="addt" cols="30" rows="10" class="form-control"></textarea>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="categorydddd">Preview Image:</label>
                           <input type="file" name="preview" id=" preview" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                           <div class="my-2">
                            <img id="blah"  width="150"  />

                           </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">

                            <div class="upload__box">
                                <div class="upload__btn-box">
                                  <label class="upload__btn">
                                    <p>Upload images</p>
                                    <input type="file" name="gallery[]" multiple="" data-max_length="20" class="upload__inputfile" >
                                  </label>
                                </div>
                                <div class="upload__img-wrap"></div>
                              </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <button type="submit" class="btn btn-primary">Add product</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
@push('footer_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>







<script>
    $('#category').change(function(){
        var category_id=$(this).val()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'Post',
            url:'getsubcategory',
            data:{'category_id':category_id},
            success:function(data){
                $('#subcategory').html(data)
            }
        });

    })
</script>



@endpush
@push('footer_script')


  <script>
    $("#input-tags").selectize({
        delimiter: ",",
        persist: false,
        create: function (input) {
          return {
              value: input,
              text: input,
          };
        },
      });
</script>


@endpush
@push('footer_script')
<!-- include summernote css/js -->

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#short_desp').summernote();
      });
      $(document).ready(function() {
        $('#long_desp').summernote();
      });
      $(document).ready(function() {
        $('#addt').summernote();
      });
</script>

@endpush
@push('footer_script')
<script>
    jQuery(document).ready(function () {
        ImgUpload();
      });

      function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function () {
          $(this).on('change', function (e) {
            imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
            var maxLength = $(this).attr('data-max_length');

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {

              if (!f.type.match('image.*')) {
                return;
              }

              if (imgArray.length > maxLength) {
                return false
              } else {
                var len = 0;
                for (var i = 0; i < imgArray.length; i++) {
                  if (imgArray[i] !== undefined) {
                    len++;
                  }
                }
                if (len > maxLength) {
                  return false;
                } else {
                  imgArray.push(f);

                  var reader = new FileReader();
                  reader.onload = function (e) {
                    var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                    imgWrap.append(html);
                    iterator++;
                  }
                  reader.readAsDataURL(f);
                }
              }
            });
          });
        });

        $('body').on('click', ".upload__img-close", function (e) {
          var file = $(this).parent().data("file");
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
              imgArray.splice(i, 1);
              break;
            }
          }
          $(this).parent().parent().remove();
        });
      }
</script>

@endpush
