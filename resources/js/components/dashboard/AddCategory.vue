<template>
    <div class="container">
        <Header title="Add New Category" />

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
import { mapActions } from "vuex";
export default {
    name: "AddCategory",
    components: {
        Header
    },
    data() {
        return {
            show: false,
            catName: "",
            selectedImage: null,
        };
    },
    mounted() {
        this.show = true;
        
    },
    methods: {
        ...mapActions(["addCategory"]),
        submitCategory() {
			if(this.catName == "" || this.selectedImage == null){
				return;
			}
			// console.log(this.selectedImage.name);
			const fd = new FormData();
			fd.append('image',this.selectedImage,this.selectedImage.name);
			fd.append('catName',this.catName);
            this.addCategory(fd);
            this.catName = "";
        },
        imageselected(event){
			this.selectedImage = event.target.files[0];
        }
    }
};
</script>
