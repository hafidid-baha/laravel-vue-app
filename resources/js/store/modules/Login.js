import router from "../../router";

const state = {
    token: localStorage.getItem("access_token") || null
};

const getters = {
    loggedIn: state => state.token !== null
};

const actions = {
    login({ commit }, credentials) {
        // console.log('login action has been triggered');
        axios
            .post("/login", {
                username: credentials.username,
                password: credentials.password
            })
            .then(res => {
                const token = res.data.access_token;
                // console.log(token);
                if (token != undefined) {
                    localStorage.setItem("access_token", token);
                    commit("getAccessToken", token);
                    router.push("/Dashboard");
                }
            })
            .catch(error => console.log("axios error"));
    },
    logout({ commit, getters, state }) {
        if (getters.loggedIn) {
            // console.log('ready to logout the user');
            axios.defaults.headers.common["Authorization"] =
                "Bearer " + state.token;
            axios
                .post(
                    "/logout"
                    // {
                    //     headers: {
                    //         // 'Authorization': 'Bearer '+ state.token
                    //         'Authorization': `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI2IiwianRpIjoiM2ZmNmVkOGYwMzA4ODg0NzliZThkMmYyMTFjNWRiYjAzOWZlYjM2MDk0YjA0ODUyMGNmZTQ3ODY5NmU1YzQzNzRhNWIyMTJkZTkxMzUyYzciLCJpYXQiOjE1ODk1NTY0NDksIm5iZiI6MTU4OTU1NjQ0OSwiZXhwIjoxNjIxMDkyNDQ5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.YEIjsSd5bpx6hF9gqryQ1yIuC0n5fAdECz2zTg7cwVRU64GXcEzn1F8FQLhj6s5BBmlhXkMYSlSn8pS1pDbKwCAwgVnikoRRkZfo-cXnfvlSydYxcGL4q3T5UMX9b14Fq8bDKCNcn_l3Bt_J8cnP7jU9Gl7rhXv1EcJzNbmB_T9j8sOeIHqJUgSmkWVRrIe9n7S5L07-f3Ae6bhrcwjoAnK9Bop6Lq1szBJVt5zIm2P-E6-kGnFxH5YEWHXs6om0TJ1rDnEy6QGbmiZVGt5SHseSxjPfEQRAqEm3TREFkbJpsJ8a2IXKMwzS2tISjk1mbSS3gjehyEadsN0oOH6ds3df0RwrstxTpm--vXkta_Z3qDUcKJg79yg7ryMmTjqlXRgP45mj0d8EyD05OqNG6qJdkP7XaQVfJeljTewSHfZELxJmQDq3wljczK5OajNHFQ3yFIJO5G430V599URFqhNeufj-GF3XhrnwOCn4ZoPcMVyN63TxU4K4hwy-KDfWRSDdMGEdc4dIs1NQw5jvrbIzLd81NQfVwA3D_57KFHIqQNjXpk2W0TWHBJlTj4IFUMaOftW2QdbKmRqbPE-5ASDR90RTFZ2MQK-FcjBTAeoWXknyOlH3Ji3KZn6KcGgBWbDx11lAZIbhXGFxGKN-BysivgQs6CFEVMeTrbM_b5c`
                    //     }
                    // }
                )
                .then(res => {
                    // const token = res.data.access_token;
                    // console.log(token);
                    localStorage.removeItem("access_token");
                    commit("clearToken");
                    router.push("/");
                })
                .catch(error => {
                    console.log(error);
                    localStorage.removeItem("access_token");
                    commit("clearToken");
                    router.push("/");
                });
        } else {
            router.push("/login");
        }
    }
};

const mutations = {
    getAccessToken(state, token) {
        // state.count = 4;
        state.token = token;
    },
    clearToken(state) {
        state.token = null;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
