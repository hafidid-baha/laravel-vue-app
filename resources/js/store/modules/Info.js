
const state = {
    info:{
        name: 'hafid id-baha',
        projectsCount: 23,
        tasksCount: 100,
        about: "is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised",
        slug: "You Look For Full Stack Devlopper For Your Next Project",
        interests:[
            "front end framworks", "laravel framwork","design pattern","solid principles","artifical antilegent"
        ],
    },
    lastProjects:[
        {
            name:"project name",
            desc : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda accusantium nam doloribus corporis fugit temporibus repudiandae, dolor",
            tasks :20,
            status: "onProgress",
            startDate:"20-11-2018",
            endDate:null
        },
        {
            name:"project name",
            desc : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda accusantium nam doloribus corporis fugit temporibus repudiandae, dolor",
            tasks :20,
            status: "complete",
            startDate:"20-11-2018",
            endDate:"21-5-2015"
        },
    ]
}

const getters = {
    personInfo: (state) => state.info,
    lastProjects: (state) => state.lastProjects
}

const actions = {}

const mutations = {}

export default {
    state,
    getters,
    actions,
    mutations
}