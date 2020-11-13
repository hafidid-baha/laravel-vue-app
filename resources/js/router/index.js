import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Logout from '../views/Logout.vue'
import Info from '../components/home/Infoleft.vue'
import Details from '../components/home/Details.vue'
import ProjectDetails from '../components/home/ProjectDetails.vue'
import dashProjectDetails from '../components/dashboard/ProjectDetails.vue'
import Contact from '../components/home/Contact.vue'
import Index from '../components/dashboard/Index.vue'
import Projects from '../components/dashboard/Projects.vue'
import AddProject from '../components/dashboard/AddProject.vue'
import Ideas from '../components/dashboard/Ideas.vue'
import AddIdea from '../components/dashboard/AddIdea.vue'
import Profile from '../components/dashboard/Profile.vue'
import Interests from '../components/dashboard/Interests.vue'
import AddInterest from '../components/dashboard/AddInterest.vue'
import Categories from '../components/dashboard/Categories.vue'
import AddCategory from '../components/dashboard/AddCategory.vue'
import EditCategory from '../components/dashboard/EditCategory.vue'
import EditInterest from '../components/dashboard/EditInterest.vue'
import EditIdea from '../components/dashboard/EditIdea.vue'
import EditProject from '../components/dashboard/EditProject.vue'
import Dashboard from '../views/Dashboard.vue'
import store from '../store'


Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    children:[
      {
        path: '',
        component: Info
      },
      {
        path: 'Details/:id',
        component: Details
      },
      {
        path: 'ProjectDetails/:id',
        component: ProjectDetails
      },
      {
        path: 'Contact',
        component: Contact
      }
    ]
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
    meta: { requiresAuth: true },
    children:[
      {
        path:'',
        component:Index,
      },
      {
        path:'Project',
        component:Projects
      },
      {
        path:'AddProject',
        component:AddProject
      },
      {
        path:'Ideas',
        component:Ideas
      },
      {
        path:'AddIdea',
        component:AddIdea
      },
      {
        path:'Profile',
        component:Profile
      },
      {
        path: 'Interests',
        component: Interests
      },
      {
        path: 'AddInterest',
        component: AddInterest
      },
      {
        path: 'Categories',
        component: Categories
      },
      {
        path: 'AddCategory',
        component: AddCategory
      },
      {
        path: 'EditCategory/:id',
        component: EditCategory
      },
      {
        path: 'EditInterest/:id',
        component: EditInterest
      },
      {
        path: 'EditIdea/:id',
        component: EditIdea
      },
      {
        path: 'EditProject/:id',
        component: EditProject
      },
      {
        path: 'DashProjectDetails/:id',
        component: dashProjectDetails
      }
    ]
  },
  {
    path: '/Login',
    name: 'Login',
    component: Login,
    meta: { requiresVisitor: true }
  },
  {
    path: '/Logout',
    name: 'Logout',
    component: Logout,
    meta: { requiresAuth: true }
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!store.getters.loggedIn) {
      next({
        path: '/login',
      })
    } else {
      next()
    }
  } else if (to.matched.some(record => record.meta.requiresVisitor)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (store.getters.loggedIn) {
      next({
        path: '/',
      })
    } else {
      next()
    }
  }
  else {
    next() // make sure to always call next()!
  }
})

export default router
