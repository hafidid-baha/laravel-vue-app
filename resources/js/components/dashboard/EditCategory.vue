<template>
    <div class="container">
        <Header title="Update Category" />

        <form class="mt-3">
            <div class="form-group">
                <label for="categoryname">Category Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="categoryname"
                    placeholder="Category Name"
                    v-model="catName"
                />
            </div>

            <div class="form-group">
                <label >Category Icon</label>
                <div class="custom-file">
                    <input
                        type="file"
                        class="custom-file-input"
                        id="customFile"
                        accept="image/png"
                        @change="imageselected"
                    />
                    <label class="custom-file-label" for="customFile"
                        >Choose file</label
                    >
                </div>
            </div>

            <!-- <div class="form-group">
                <label for="interestdesc">Interest Description</label>
                <textarea
                    class="form-control"
                    id="interestdesc"
                    placeholder="Interest Description"
                    v-model="desc"
                ></textarea>
            </div> -->

            <div class="form-group">
                <button @click.prevent="submitCategory" class="btn btn-login">
                    Add Category
                </button>
            </div>
        </form>
    </div>
</template>
<script>
import Header from "../Header.vue";
import { mapActions,mapGetters } from "vuex";
export default {
    name: "EditCategory",
    components: {
        Header
    },
    data() {
        return {
            show: false,
            catName: "",
            selectedImage: null,
            id :0,
            category :null
        };
    },
    mounted() {
        this.show = true;
        this.id = this.$route.params.id
        this.category = this.allProjectCat.filter(cat => cat.id==this.id)[0];

        this.catName = this.category.name;
        
    },
    methods: {
        ...mapActions(["updateCategory"]),
        submitCategory() {
			if(this.catName == ""){
				return;
			}
			// console.log(this.selectedImage.name);
            const fd = new FormData();
            fd.append('id',this.id);
            if(this.selectedImage !== null){
                fd.append('image',this.selectedImage,this.selectedImage.name);
                fd.append('oldimage',this.category.name+".png");
            }
			fd.append('catName',this.catName);
            this.updateCategory(fd);
            this.catName = "";
        },
        imageselected(event){
			this.selectedImage = event.target.files[0];
        }
    },
    computed: mapGetters(['allProjectCat'])
};
</script>
