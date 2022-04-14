import { Link } from "@inertiajs/inertia-react";
import React from "react";
import route from "ziggy-js";

const Welcome = () => {
    return <div className="d-flex flex-column container mx-auto">
        <Link href={route('signin')}>
            <a>Sign in</a>
        </Link>
        <Link href={route('signup')}>
             Sign up
        </Link>
        <h1>Welcome</h1>
        </div>
}

export default Welcome;
