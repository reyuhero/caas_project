import React from "react";
interface Props {
    children: React.ReactNode;
}
const Nav = ({ children }: Props) => {
    return <nav className="z-3 bg-white relative text-center p-2 W-100 mb-2 d-flex justify-content-between shadow-md align-items-center ">
        {children}
    </nav>
}

export default Nav;
