import router from '../../router'
// const axios = axios.create({
//     baseURL : "https://manzak.online/api",
//     httpsAgent: new https.Agent({  
//         rejectUnauthorized: false
//     })
// });

const state= {
    ideas:[],
    categories:[],
    interests:[],
    user:{},
    userSettings:{},
    projects:[],
    showLayout:false,

    selectedCategory:"", // used to detect the selected category whene the user clcked on the nav item
    slectedProject:[] // used to hold all the project whene the nav item has clicked

}

const getters= {
    allIdeas :(state)=> (state.ideas),
    allProjectCat :(state)=> (state.categories),
    allInterests :(state)=> (state.interests),
    authUser : (state)=> (state.user),
    authUserSet : (state)=> (state.userSettings),
    allProjects : (state)=> (state.projects),
    showLayoutState : (state)=> (state.showLayout),

    selectedCat : (state) => (state.selectedCategory),
    selectedProjects :(state)=>(state.slectedProject)
}

const actions = {

    addIntersts({commit,rootState },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        
        axios.post('/addInterest', {
            title: data.title,
            desc: data.desc
        }).then(res=>{
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    addCategory({rootState },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/addCategory', data)
        .then(res=>{
            
            router.push('/Dashboard/Categories');
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    addIdea({commit,rootState },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/addIdea', {
            title: data.title,
            desc: data.desc,
            project_category : data.project_category
        }).then(res=>{
            router.push('/Dashboard/Ideas');
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    addProject({commit,rootState },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/addProject', data)
        .then(res=>{
            router.push('/Dashboard/Project');
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    sendMessage(data){
        axios.post('/sendMessage', data)
        .then(res=>{
            router.push('/Dashboard');
        }).catch(error=>{
            console.log(error);
        })
    },

    updateIdea({rootState },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/updateIdea', data)
        .then(res=>{
            router.push('/Dashboard/Ideas');
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    updateIntersts({commit,rootState },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/updateInterest', data)
        .then(res=>{
            router.push('/Dashboard/Interests');
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    updateProject({commit,rootState},data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/updateProject',data)
        .then(res=>{
            router.push('/Dashboard/Project');
        }).catch(error=>{
            console.log(error);
        })
    },

    updateUser({commit,rootState },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/updateUser',data)
        .then(res=>{
            
            
        }).catch(error=>{
            console.log(error);
        })
    },

    updateCategory({rootState },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/updateCategory', data)
        .then(res=>{
            
            router.push('/Dashboard/Categories');
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    getCategories({commit,rootState }){
        // axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.get('/getCategories')
        .then(res=>{
            const categories = res.data.data;
            commit('setCategories',categories);
            // console.log(categories);
        }).catch(error=>{
            console.log(error);
        })
    },

    getInterests({commit,rootState },lateLoad=false){
        // axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.get('/getInterests')
        .then(res=>{
            const interests = res.data.data;
            commit('setInterests',interests);
            if(lateLoad){
                commit('setShowLayout',true);
            }
            
        }).catch(error=>{
            console.log(error);
            commit('setShowLayout',false);
        })
    },

    getUser({commit,rootState},lateLoad=false){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.get('/user')
        .then(res=>{
            const user = res.data;
            commit('setUser',user);
            if(lateLoad){
                commit('setShowLayout',true);
            }
            
        }).catch(error=>{
            console.log(error);
            if(lateLoad){
                commit('setShowLayout',false);
            }
        })
    },

    getUserSettings({commit,rootState},lateLoad=false){
        // axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.get('/getUserSettings')
        .then(res=>{
            const data = res.data.data[0];
            commit("setSettings",data);
            if(lateLoad){
                commit('setShowLayout',true);
            }
            
        }).catch(error=>{
            console.log(error);
            if(lateLoad){
                commit('setShowLayout',false);
            }
        })
    },

    getProjects({commit,rootState},lateLoad=false){
        // axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.get('/getProjects')
        .then(res=>{
            const data = res.data.data;
            commit("setProjects",data);
            if(lateLoad){
                commit('setShowLayout',true);
            }
            
        }).catch(error=>{
            console.log(error);
            if(lateLoad){
                commit('setShowLayout',false);
            }
        })
    },

    getIdeas({commit,rootState },lateLoad=false){
        // axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.get('/getIdeas')
        .then(res=>{
            const ideas = res.data.data;
            commit('setIdeas',ideas);
            if(lateLoad){
                commit('setShowLayout',true);
            }
        }).catch(error=>{
            console.log(error);
            if(lateLoad){
                commit('setShowLayout',false);
            }
        })
    },

    // get data from interest, ideas, projects,
    getPreparedData({commit,rootState },lateLoad=false){
        console.log('prepared data function is triggered');
        // axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.get('/getPreparedData')
        .then(res=>{
            const data = res.data;
            commit('setPreparedData',data);
            // console.log();
            if(lateLoad){
                commit('setShowLayout',true);
            }
        }).catch(error=>{
            console.log(error);
            if(lateLoad){
                commit('setShowLayout',false);
            }
        })
    },

    deleteProject({rootState,commit },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/deleteProject', data)
        .then(res=>{
            
            // router.push('/Dashboard/Categories');
            commit('dProject',data.get('id'));
            // commit('dProject',id);
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    deleteCategory({rootState,commit },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/deleteCategory', data)
        .then(res=>{
            
            // router.push('/Dashboard/Categories');
            commit('dCategory',data.get('id'));
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    deleteInterest({rootState,commit },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/deleteInterest', data)
        .then(res=>{
            
            // router.push('/Dashboard/Categories');
            commit('dCategory',data.get('id'));
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    deleteIdea({rootState,commit },data){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+rootState.Login.token;
        // console.log(rootState.Login.token);
        axios.post('/deleteIdea', data)
        .then(res=>{
            // router.push('/Dashboard/Categories');
            commit('dIdea',data.get('id'));
        }).catch(error=>{
            console.log(error);
        })
        // console.log('the add interest is ready');
    },

    updateTheCategories({ commit,getters },id){
        //this.id = this.$route.params.id;
        // alert("the id is "+id);

        let catProjects = getters.allProjects.filter(p=>(p.category_id==id));
        let category =  getters.allProjectCat.filter(c=>(c.id==id));

        // console.log(catProjects);
        commit("setSelecetedCategory",{cat:category,pro:catProjects});
    },

    filterProject({getters},id){
        
    },


    

}

const mutations = {
    setIdeas(state,ideas){
        state.ideas = ideas;
    },
    setCategories(state,categories){
        state.categories = categories;
    },
    setInterests(state,interests){
        state.interests = interests;
    },
    dCategory(state,id){
        state.categories = state.categories.filter(cat => {
            return cat.id != id
        });
    },
    dIdea(state,id){
        state.ideas = state.ideas.filter(idea => {
            return idea.id != id
        });
    },
    setUser(state,user){
        state.user = user;
    },
    setSettings(state,set){
        state.userSettings = set;
    },
    setProjects(state,set){
        state.projects = set;
    },
    dProject(state,id){
        state.projects = state.projects.filter(project => {
            return project.id != id
        });
    },
    setShowLayout(state,data){
        state.showLayout = data;
    },
    setPreparedData(state,data){
        state.interests = data.interests;
        state.projects = data.projects;
        state.userSettings = data.userSet[0];
        state.ideas = data.ideas;
        state.categories = data.categories;
    },
    setSelecetedCategory(state,data){
        state.selectedCategory = data.cat;
        state.slectedProject = data.pro;
        // console.log(data.cat);
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}