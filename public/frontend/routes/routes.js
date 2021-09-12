import Login from "@/components/auth/Login";
import Register from "@components/auth/Register";
import Home from "@/components/Home";

export const routes = [
    {
      name: 'home',
      path: '/',
      component:  Home
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
];
