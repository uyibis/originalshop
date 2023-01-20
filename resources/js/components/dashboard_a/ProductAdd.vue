<template>
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <nav class="mb-2" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-sa-simple">
                            <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="app-products-list.html">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        </ol>
                    </nav>
                    <h1 class="h3 m-0">Edit Product</h1>
                </div>
                <div class="col-auto d-flex"><a href="#" class="btn btn-secondary me-3">Duplicate</a><a href="#" class="btn btn-primary">Save</a></div>
            </div>
        </div>
        <div class="sa-entity-layout" data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
            <div class="sa-entity-layout__body">
                <div class="sa-entity-layout__main">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Basic information</h2>
                            </div>
                            <div class="mb-4"><label for="form-product/name" class="form-label">Name</label>
                                <input  type="text" class="form-control" id="form-product/name" placeholder="Product Name" :value="prod.name" /></div>
                            <div class="mb-4"><label for="form-product/slug" class="form-label">Slug</label>
                                <div class="input-group input-group--sa-slug"><span class="input-group-text" id="form-product/slug-addon">https://example.com/products/</span>
                                    <input type="text" class="form-control" id="form-product/slug" aria-describedby="form-product/slug-addon form-product/slug-help" placeholder="product slug" :value="prod.slug"/></div>
                                <div id="form-product/slug-help" class="form-text">Unique human-readable product identifier. No longer than 255 characters.</div>
                            </div>
                            <div class="mb-4"><label for="form-product/description" class="form-label">Description</label>
                                <textarea hidden id="form-product/description" class="sa-quill-control form-control" :value="prod.description" placeholder="Product Description" rows="8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.</textarea>

                            </div>
                            <div><label for="form-product/short-description" class="form-label">Short description</label>
                                <textarea id="form-product/short-description" placeholder="Product short Description" :value="prod.short_description" class="form-control" rows="2"></textarea></div>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Pricing</h2>
                            </div>
                            <div class="row g-4">
                                <div class="col"><label for="form-product/price" class="form-label">Price</label>
                                    <input type="number"  class="form-control" id="form-product/price" :value="prod.price" /></div>
                                <div class="col"><label for="form-product/old-price" class="form-label">Sale Price</label>
                                    <input type="number" class="form-control" :value="prod.sale_price" id="form-product/old-price" /></div>
                            </div>

                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Inventory</h2>
                            </div>
                            <div class="mb-4"><label for="form-product/sku" class="form-label">SKU</label><input readonly :value="prod.name" type="text" class="form-control" id="form-product/sku" value="SCREW150" /></div>
                            <div class="mb-4 pt-2"><label class="form-check"><input type="checkbox" class="form-check-input" /><span class="form-check-label">Enable stock management</span></label></div>
                            <div><label for="form-product/quantity" class="form-label">Stock quantity</label>
                                <input type="number" class="form-control" id="form-product/quantity" :value="inventory.quantity" /></div>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Images</h2>
                            </div>
                        </div>
                        <div class="mt-n5">
                            <div class="sa-divider"></div>
                            <div class="d-flex bd-highlight p-3">
                                <div class="p-2 bd-highlight"><th class="w-min">Image</th></div>
                                <div class="p-2 flex-grow-1 bd-highlight"><th class="min-w-10x">Alt text</th></div>
                                <div class="p-2 bd-highlight text-center"><th class="w-min">Order</th></div>
                                <div class="p-2 bd-highlight">      </div>
                            </div>

                            <div v-for="image in images" class="d-flex bd-highlight p-3">
                                <div class="p-2 bd-highlight">
                                    <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg"><img src="images/products/product-16-1-40x40.jpg" width="40" height="40" alt="" /></div>
                                </div>
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <input type="text" class="form-control form-control-sm" />
                                </div>
                                <div class="p-2 bd-highlight"></div>
                                <div class="p-2 bd-highlight text-center">
                                    <button class="btn btn-sa-muted btn-sm mx-n3" type="button" aria-label="Delete image" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete image"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                                        <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z"></path>
                                    </svg></button>
                                </div>
                            </div>
                            <div class="sa-divider"></div>
                            <div class="px-5 py-4 my-2 flex">
                                <input type="file" hidden id="uploader" multiple @change="uploader" />
                                <label for="uploader" class="btn btn-link text-decoration-none">
                                    <bt-process :loader="loader" :show-content="showContent" text="Add Image"/><span style="" v-if="loader">{{progressing}}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                                <div class="mt-3 text-muted">Provide information that will help improve the snippet and bring your product to the top of search engines.</div>
                            </div>
                            <div class="mb-4"><label for="form-product/seo-title" class="form-label">Page title</label>
                                <input type="text" class="form-control" id="form-product/seo-title" :value="prod.page_title"/></div>
                            <div><label for="form-product/seo-description" class="form-label">Meta description</label>
                                <textarea id="form-product/seo-description" :value="prod.meta_description" class="form-control" rows="2"></textarea></div>
                        </div>
                    </div>
                </div>
                <div class="sa-entity-layout__sidebar">
                    <div class="card w-100">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Visibility</h2>
                            </div>
                            <div class="mb-4"><label class="form-check">
                                <input type="radio" :value="prod.visibility" class="form-check-input" name="status" /><span class="form-check-label">Published</span></label><label class="form-check">
                                <input type="radio" :value="prod.visibility" class="form-check-input" name="status" checked="" /><span class="form-check-label">Scheduled</span></label><label class="form-check mb-0">
                                <input type="radio" :value="prod.visibility" class="form-check-input" name="status" /><span class="form-check-label">Hidden</span></label></div>

                        </div>
                    </div>
                    <div class="card w-100 mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Categories</h2>
                            </div><select :value="prod.categories" class="sa-select2 form-select" multiple="">
                            <option disabled  selected="">Select All Applicable Categories</option>
                          <template v-for="cat in cats">
                            <option :value="cat.name">{{cat.name}}</option>
                          </template>
                        </select>
                            <div class="mt-4 mb-n2"><a href="#">Add new category</a></div>
                        </div>
                    </div>
                    <div class="card w-100 mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Tags</h2>
                            </div>
                            <select class="sa-select2 form-select" data-tags="true" multiple="">
                            <option selected="">Universe</option>
                            <option selected="">Sputnik</option>
                            <option selected="">Steel</option>
                            <option selected="">Rocket</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import BtProcess from "../btProcess.vue";
export default {
    name: "ProductAdd",
    components: {BtProcess},
    props:['id','prods','base'],
    mounted() {
        this.toast("This is a toast sdafasfadsf adfadf da fa d ","green");
        this.toast("This is a toast sdafasfadsf adfadf da fa d ","red");
       this. toast("This is a toast sdafasfadsf adfadf da fa d ","blue");
    },
    data(){
        return {
            images:[],
            loader:false,
            showContent:true,
            progressing:'100%',
            prod:{
                'name':'',
                'slug':'',
                'description':'',
                'short_description':'',
                'images':'',
                'price':'',
                'sale_price':'',
                'page_title':'',
                'meta_description':'',
                'visibility':0,
                'categories':[],
                'verified':'',
                'brand':'',
                'manufacturer':'',
                'tags':'',
                'myear':'',
                'category_id':0,
                'user_id':''
            },
            inventory:{
                quantity:0
            },
            cats:[]

        }
    }
    ,
    created() {
        var scripts = [
            this.base+ 'vendor/simplebar/simplebar.min.js',
            this.base+ 'vendor/highlight.js/highlight.pack.js',
            this.base+ 'vendor/quill/quill.min.js',
            this.base+'vendor/air-datepicker/js/datepicker.min.js',
            this.base+'vendor/air-datepicker/js/i18n/datepicker.en.js',
            this.base+'vendor/select2/js/select2.min.js',
            this.base+'vendor/nouislider/nouislider.min.js',
            this.base+'vendor/fullcalendar/main.min.js',
            this.base+'js/stroyka.js',
            this.base+'js/custom.js',
            this.base+'js/calendar.js',
            this.base+'js/demo.js',
            this.base+'js/demo-chart-js.js'
        ];
        scripts.forEach(script => {
            let tag = document.createElement("script");
            tag.setAttribute("src", script);
            document.head.appendChild(tag);
        });
    }
,
    methods:{
        toast(text,bgColor){
            Toastify({
                text: text,
                className: "info",
                style: {
                    background: bgColor,
                }
            }).showToast();
        }
        ,
        openUploader(){
            $("#uploadModal").show();
        }
        ,
        uploader(event) {
           // alert('hi');

           // alert(link);
            event.target.files.forEach(this.upload);

        },
        upload (item){
            const link = this.base+'uploads';
            let data = new FormData();
            data.append('associate', 'Product');
            data.append('id', this.id);
            data.append('image', event.target.files[0]);
            //this.previewImage= URL.createObjectURL( event.target.files[0]);
            console.log('d1',data);

            axios.post(
                link,
                data,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function( progressEvent ) {
                        this.progressing= parseInt( Math.round( ( progressEvent.loaded / progressEvent.total ) * 100 ) );
                       // console.log('uploading' ,i);
                    }.bind(this)
                }
            ).then(
                response => {
                    console.log(response.data);
                    console.log( response.data.path);
                    this.images.append({path:response.data.path,imageId:response.data.id,alt:""});
                }
            )
        }

    }
}
</script>

<style scoped>

</style>
