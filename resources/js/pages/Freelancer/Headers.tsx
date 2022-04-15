import Nav from '@/components/Nav'
import { Head } from '@inertiajs/inertia-react'
import React from 'React'

function Headers({title}) {
    return (
        <header>
            <Head title={title}/>
            <Nav>
                <article className="align-items-center ">
                    <div className="px-2 fw-bold fs-2 pe-5">CAAS</div>
                    <section className="cols-3 flow-column gap-2">
                        <button className="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dashboard"><i className="fas fa-house-user"></i></button>
                        <button className="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Projects"><i className="fas fa-file-invoice"></i></button>
                        <button className="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Team"><i className="fas fa-users"></i></button>
                        <button className="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Reports"><i className="fas fa-scroll"></i></button>
                        <button className="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark fs-7 fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="KDS">KDS</button>
                        <button className="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Opportunities"><i className="fas fa-briefcase"></i></button>
                        <button className="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Messages"><i className="fas fa-comment-dots"></i></button>
                    </section>
                </article>
                <article className="gap-2">
                    <button className="btn btn-outline-secondary rounded-pill px-3" style={{ '--span': 2 }}>
                        <i className="fas fa-wallet pe-2"></i>
                        $0.00
                    </button>
                    <button aria-label='bookmark' className="btn btn-outline-secondary btn-circle">
                        <i className="fas fa-bookmark"></i>
                    </button>
                    <div className="dropdown">
                        <button aria-label='notification' className="btn btn-circle btn-outline-secondary rounded-pill border-0 cubic-bezier dropdown-toggle no-content" data-bs-toggle="dropdown" aria-expanded="false">
                            <i className="fas fa-bell"></i>
                        </button>
                        <ul className="dropdown-menu shadow-md mt-3 rounded-5 border-0 p-0" aria-labelledby="profile-dropdown">
                            <li className="fs-8 px-3 py-3">
                                <div className="fw-bold">Mohammad Reza Yousofi</div>
                                <div className="text-black-50">yousofimreza@gmail.com</div>
                            </li>
                            <li className="border"><a href="#" className="dropdown-item py-2"><i className="fas fa-city me-2 fs-4 text-black-50 bg-warning gradient background-clip"></i>Switch to Hiring</a></li>
                            <li><a href="#" className="dropdown-item py-2"><i className="fas fa-cog me-2 fs-4 text-black-50"></i>Settings</a></li>
                            <li><a href="#" className="dropdown-item py-2"><i className="fas fa-envelope me-2 fs-4 text-black-50"></i>Email preferences</a></li>
                            <li><a href="#" className="dropdown-item py-2"><i className="fas fa-question-circle me-2 fs-4 text-black-50"></i>Help</a></li>
                            <li><a href="#" className="dropdown-item py-2"><i className="fas fa-sign-out-alt me-2 fs-4 text-black-50"></i>Log out</a></li>
                        </ul>

                    </div>
                    <input type="text" name="search" id="search" placeholder="search" className="1 border border-secondary px-3 rounded-pill" />
                    <div className="dropdown">
                        <button aria-label='button' className="btn btn-outline-gray p-0 rounded-pill border-0" >
                            <img alt="profile" src="/public/images/img.jpg" className=" rounded-pill dropdown-toggle no-content" style={{ width: "30px" }} />
                        </button>
                        <div id="profile-dropdown" className="btn rounded-pill  overflow-hidden p-0 dropdown-toggle no-content" data-bs-toggle="dropdown">
                            <i className="fas fa-angle-down text-black-50"></i>
                        </div>
                        <ul className="dropdown-menu shadow-md mt-3 rounded-5 border-0 p-0" aria-labelledby="profile-dropdown">
                            <li className="fs-8 px-3 py-3">
                                <div className="fw-bold ">Mohammad Reza Yousofi</div>
                                <div className="text-black-50">yousofimreza@gmail.com</div>
                            </li>
                            <li className="border"><a href="#" className="dropdown-item py-2"><i className="fas fa-city me-2 fs-4 text-black-50 bg-warning gradient background-clip"></i>Switch to Hiring</a></li>
                            <li><a href="#" className="dropdown-item py-2"><i className="fas fa-cog me-2 fs-4 text-black-50"></i>Settings</a></li>
                            <li><a href="#" className="dropdown-item py-2"><i className="fas fa-envelope me-2 fs-4 text-black-50"></i>Email preferences</a></li>
                            <li><a href="#" className="dropdown-item py-2"><i className="fas fa-question-circle me-2 fs-4 text-black-50"></i>Help</a></li>
                            <li><a href="#" className="dropdown-item py-2"><i className="fas fa-sign-out-alt me-2 fs-4 text-black-50"></i>Log out</a></li>
                        </ul>
                    </div>
                </article>
            </Nav>
        </header>
    )
}

export default Headers
