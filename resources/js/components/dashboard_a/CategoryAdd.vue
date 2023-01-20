<template>
    <div class="container container--max--xl">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <nav class="mb-2" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-sa-simple">
                            <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="app-categories-list.html">Categories</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                        </ol>
                    </nav>
                    <h1 class="h3 m-0">Edit Category</h1>
                </div>
                <div class="col-auto d-flex"><a href="#" class="btn btn-warning me-3">Discard</a><a @click="saveCat" href="#" class="btn btn-primary">Save</a></div>
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
                            <div class="mb-4"><label for="form-category/name" class="form-label">Name</label>
                                <input v-model="cat.name" type="text" class="form-control" id="form-category/name" placeholder="Category Name" /></div>
                            <div class="mb-4"><label for="form-category/slug" class="form-label">Slug</label>
                                <div class="input-group input-group--sa-slug"><span class="input-group-text" id="form-category/slug-addon">https://example.com/catalog/</span>
                                    <input v-model="cat.slug" type="text" class="form-control" id="form-category/slug" aria-describedby="form-category/slug-addon form-category/slug-help" placeholder="Slug" /></div>
                                <div id="form-category/slug-help" class="form-text">Unique human-readable category identifier. No longer than 255 characters.</div>
                            </div>
                            <div class="mb-4"><label for="form-category/description" class="form-label">Description</label>
                                <textarea v-model="cat.description" id="form-category/description" class="sa-quill-control form-control" rows="8" placeholder="Description"></textarea></div>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                                <div class="mt-3 text-muted">Provide information that will help improve the snippet and bring your category to the top of search engines.</div>
                            </div>
                            <div class="mb-4"><label for="form-category/seo-title" class="form-label">Page title</label>
                                <input v-model="cat.title" type="text" class="form-control" id="form-category/seo-title" /></div>
                            <div><label for="form-category/seo-description" class="form-label">Meta description</label>
                                <textarea v-model="cat.metaDescription" id="form-category/seo-description" class="form-control" rows="2"></textarea></div>
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
                                <input v-model="cat.visibility" type="radio" value="1" class="form-check-input" name="status" /><span class="form-check-label">Published</span></label>

                                <label class="form-check mb-0">
                                <input v-model="cat.visibility" type="radio" value="0" class="form-check-input" name="status" /><span class="form-check-label">Hidden</span></label>
                            </div>


                        </div>
                    </div>
                    <div class="card w-100 mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Parent category</h2>
                            </div>
                        <select v-model="cat.parentCategory" class="sa-select2 form-select">
                            <option selected="selected">None</option>
                         <template v-for="item in categories">
                            <template v-if="item.name!= null">
                                <option :value="item.id">{{item.name}}</option>
                            </template>
                         </template>
                        </select>
                            <div class="form-text">Select a category that will be the parent of the current one.</div>
                        </div>
                    </div>
                    <div class="card w-100 mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Image</h2>
                            </div>
                            <progressbar :image="previewImage" :i="i" :display="display"/>
                            <div class="border p-4 d-flex justify-content-center">

                                <label for="imgselector" class="max-w-20x"><img :src="previewImage" class="w-100 h-auto" width="320" height="320" alt="" />
                                 </label>
                                <input id="imgselector" v-show="false" type="file" accept="image/jpeg" @change=uploadImage>
                            </div>
                            <div class="mt-4 mb-n2"><a href="#" class="me-3 pe-2"><label for="imgselector">Change image</label></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Progressbar from "./progressbar.vue";
export default {
    name: "CategoryAdd",
    components: {Progressbar},
    props:['id','cats','base']
        ,
    data(){
        return {
            cat:{
                id:0,
                name:'',
                slug:'',
                description:'',
                title:'',
                metaDescription:'',
                visibility:'',
                parentCategory:'',
                image:''
            },
            previewImage: this.base+'images/products/product-7-320x320.jpg',
            categories:[],
            display:true,
            i:0
        }
    },
    mounted() {
        //alert(this.id);
        //console.log(this.cats);
        this.cat.id=this.id;
        if(this.cats.name!=null){
            this.cat.name=this.cats.name;
            this.cat.slug=this.cats.slug;
            this.cat.description=this.cats.description;
            this.cat.title=this.cats.page_title;
            this.cat.metaDescription=this.cats.meta_description;
            this.cat.visibility=this.cats.visibility;
            this.cat.parentCategory=this.cats.parent_category;
            this.cat.image=this.cats.image_name;
        }
        this.getCategories();
    }
    ,
    methods:{
        async getCategories() {
            let  url=this.base+'api/categories';
            //alert(url);
            let resp = await axios.get(url);
            this.categories=resp.data;
            console.log(resp.data)
        },
        async saveCat() {
            let resp = await axios.post(this.base + 'updatecat', this.cat);
            console.log(resp.data);
        },
        discard(){

        },
        uploadImage(event) {
            const link = this.base+'uploads';
            let data = new FormData();
            data.append('associate', 'Category');
            data.append('id', this.id);

            data.append('image', event.target.files[0]);
            //this.previewImage= URL.createObjectURL( event.target.files[0]);
            console.log('d1',data);
           // return;
            axios.post(
                link,
                data,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function( progressEvent ) {
                        this.i= parseInt( Math.round( ( progressEvent.loaded / progressEvent.total ) * 100 ) );
                        console.log('uploading' ,i);
                    }.bind(this)
                }
            ).then(
                response => {
                   console.log(response.data);
                    console.log( response.data.path)
                    this.cat.image=response.data.path;
                    this.previewImage=this.cat.image;
                    console.log(this.cat.image);
                }
            )
        }
    }
}
</script>

<style scoped>

</style>
