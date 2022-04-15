import React from 'react'
import FreelancerLayout from "@/pages/freelancer/FreelancerLayout";

const Dashboard = () => {
    return (
        <FreelancerLayout title="Dashboard freelancer">
            <div className="z-3">
                <section className="grid flow-row gap-4">
                    <div className="span" >
                        <button className="btn btn-warning fw-bold rounded-pill px-4">
                            Discover
                        </button>
                    </div>
                    <article
                        className="rounded-5 flex-column bg-white p-4 overflow-hidden  span "
                    >
                        <article className="flex justify-content-between pb-2">
                            <div>Recent Projects</div>
                            <a
                                href="#"
                                className="btn fw-bold btn-light shadow-sm px-3 rounded-pill fs-9"
                            >
                                View All Projects
                            </a>
                        </article>
                        <section className="flex-row gap-3 flex-wrapper">
                            <article
                                className="position-relative bg-light rounded-3 shadow-sm p-3 bl-danger flex-column span"
                                 >
                                <i className="fas fa-ellipsis-h text-black-50 position-absolute top-0 end-0 m-2"></i>
                                <article className="flex-row gap-2 mb-2 align-items-center">
                                    <article className="align-items-center justify-contet-center">
                                        <div
                                            className="bg-success btn-circle text-success bg-opacity"
                                            style={{ "--size": "40px" }} >
                                            <i className="fas fa-code"></i>
                                        </div>
                                    </article>
                                    <article className="flex-column">
                                        <div className="fw-bold fs-8">
                                            Product Preview...
                                        </div>
                                        <div className="fs-8 text-black-50">
                                            Iconspace Team
                                        </div>
                                    </article>
                                </article>

                                <article className="flex-column pt-1 gap-1 fs-8">
                                    <article className="justify-content-between">
                                        <div>Remain Milestone</div>
                                        <b>2</b>
                                    </article>
                                    <article className="justify-content-between gap-3">
                                        <div>Project Deadline</div>
                                        <b>6 weeks later</b>
                                    </article>
                                    <article className="justify-content-between gap-3">
                                        <div>Assigned to me</div>
                                        <b>2</b>
                                    </article>
                                    <article className="w-100 flex-column align-items-end">
                                        <b>70%</b>
                                        <progress
                                            aria-label="progress"
                                            id="sss"
                                            max="100"
                                            className=" w-100"
                                            role="progressbar"
                                            value="80"
                                        >
                                            70%
                                        </progress>
                                    </article>
                                    <hr className="my-2 text-black-50" />
                                    <article className="align-items-center justify-content-between">
                                        <div>My Task</div>
                                        <i className="fas fa-chevron-down text-black-50"></i>
                                    </article>
                                </article>
                            </article>
                            <article
                                className="position-relative bg-light rounded-3 shadow-sm p-3 bl-warning flex-column span"
                            >
                                <i className="fas fa-ellipsis-h text-black-50 position-absolute top-0 end-0 m-2"></i>
                                <article className="flex-row gap-2 mb-2 align-items-center">
                                    <article className="align-items-center justify-contet-center">
                                        <div
                                            className="bg-success btn-circle text-success bg-opacity"
                                        >
                                            <i className="fas fa-code"></i>
                                        </div>
                                    </article>
                                    <article className="flex-column">
                                        <div className="fw-bold fs-8">
                                            Product Previews...
                                        </div>
                                        <div className="fs-8 text-black-50">
                                            Iconspace Team
                                        </div>
                                    </article>
                                </article>

                                <article className="flex-column pt-1 gap-1 fs-8">
                                    <article className="justify-content-between">
                                        <div>Proposed Milestone</div>
                                        <b>2</b>
                                    </article>
                                    <article className="justify-content-between gap-3">
                                        <div>Estimated Payment</div>
                                        <b>$ 1567</b>
                                    </article>
                                    <article className="justify-content-between gap-3">
                                        <div>Assigned to me</div>
                                        <b>2</b>
                                    </article>
                                    <article className="w-100 flex-column align-items-end">
                                        <b>70%</b>
                                        <progress
                                            id="project"
                                            max="100"
                                            className="progressbar w-100"
                                            value="80"
                                        >
                                            70%
                                        </progress>
                                    </article>
                                    <hr className="my-2 text-black-50" />
                                    <article className="align-items-center justify-content-between">
                                        <div>Proposed Project Plan</div>
                                        <i className="fas fa-chevron-down text-black-50"></i>
                                    </article>
                                </article>
                            </article>
                            <article
                                className="position-relative bg-light rounded-3 shadow-sm p-3 bl-success flex-column span"
                            >
                                <i className="fas fa-ellipsis-h text-black-50 position-absolute top-0 end-0 m-2"></i>
                                <article className="align-items-center gap-2 mb-2 ">
                                    <article className="align-items-center justify-contet-center">
                                        <div className="bg-primary btn-circle text-primary bg-opacity">
                                            <i className="fab fa-codepen"></i>
                                        </div>
                                    </article>
                                    <article className="flex-column">
                                        <div className="fw-bold fs-8">
                                            Product Preview...
                                        </div>
                                        <div className="fs-8 text-black-50">
                                            Iconspace Team
                                        </div>
                                    </article>
                                </article>
                                <article className="flex-column pt-1 gap-1 fs-8">
                                    <article className="justify-content-between">
                                        <div>Completed Milestone</div>
                                        <b>2</b>
                                    </article>
                                    <article className="justify-content-between gap-3">
                                        <div>Project Payment</div>
                                        <b>$1567</b>
                                    </article>
                                    <article className="justify-content-between gap-3">
                                        <div>Assigned to me</div>
                                        <b>2</b>
                                    </article>
                                    <article className="w-100 flex-column align-items-end">
                                        <b>70%</b>
                                        <progress
                                            id="ssd"
                                            max="100"
                                            className="progressbar w-100"
                                            value="80"
                                        >
                                            70%
                                        </progress>
                                    </article>
                                    <hr className="my-2 text-black-50" />
                                    <article className="align-items-center justify-content-between">
                                        <div>My Tasks</div>
                                        <i className="fas fa-chevron-down text-black-50"></i>
                                    </article>
                                </article>
                            </article>

                            <article
                                className="position-relative bg-light rounded-3 shadow-sm p-3 bl-primary flex-column span"
                            >
                                <i className="fas fa-ellipsis-h text-black-50 position-absolute top-0 end-0 m-2"></i>

                                <article className="align-items-center gap-2 mb-2 ">
                                    <article className="align-items-center justify-contet-center">
                                        <div
                                            className="bg-danger btn-circle text-danger bg-opacity"
                                        >
                                            <i className="fas fa-terminal"></i>
                                        </div>
                                    </article>
                                    <article className="flex-column">
                                        <div className="fw-bold fs-8">
                                            Product Preview & Mock up...
                                        </div>
                                        <div className="fs-8 text-black-50">
                                            Iconspace Team
                                        </div>
                                    </article>
                                </article>

                                <article className="flex-column pt-1 gap-1 fs-8">
                                    <article className="justify-content-between">
                                        <div>Required Milestone</div>
                                    </article>
                                    <article className="justify-content-between gap-3">
                                        <div>Estimated Payment</div>
                                    </article>
                                    <article className="justify-content-between gap-3">
                                        <div>Project Deadline</div>
                                    </article>
                                </article>
                            </article>
                        </section>
                    </article>
                    <article
                        className="span gap-3 align-items-start"
                    >
                        <article className="col flex-column bg-white  rounded-4 shadow-sm p-1 h-auto">
                            <article className="col justify-content-between align-items-start p-4 pb-0">
                                <div>My team</div>
                                <i className="fas fa-ellipsis-h text-black-50"></i>
                            </article>
                            <article className="bg-light p-3 mt-2 rounded-4 flex-column gap-2">
                                <article className="align-items-center justify-content-between col">
                                    <article className="align-items-center gap-2 ">
                                        <div
                                            className="bg-success btn-circle text-success bg-opacity"
                                        >
                                            <i className="fas fa-code"></i>
                                        </div>
                                        <div>Code Studio</div>
                                    </article>
                                    <div className="fas fa-ellipsis-h text-black-50"></div>
                                </article>
                                <article className="gap-2">
                                    <i className="fas fa-user btn-circle bg-danger text-danger bg-opacity"></i>
                                    <i className="fas fa-user btn-circle bg-success text-success bg-opacity"></i>
                                    <i className="fas fa-user btn-circle bg-primary text-primary bg-opacity"></i>
                                    <i className="fas fa-user btn-circle bg-danger text-danger bg-opacity"></i>
                                </article>
                            </article>
                            <article className="bg-light p-3 mt-2 rounded-4 flex-column gap-2">
                                <article className="align-items-center justify-content-between col">
                                    <article className="align-items-center gap-2 ">
                                        <div
                                            className="bg-primary btn-circle text-primary bg-opacity"
                                        >
                                            <i className="fas fa-code"></i>
                                        </div>
                                        <div>Regrowup Devs</div>
                                    </article>
                                    <div className="fas fa-ellipsis-h text-black-50"></div>
                                </article>
                                <article className="gap-2">
                                    <i className="fas fa-user btn-circle bg-danger text-danger bg-opacity"></i>
                                    <i className="fas fa-user btn-circle bg-success text-success bg-opacity"></i>
                                    <i className="fas fa-user btn-circle bg-primary text-primary bg-opacity"></i>
                                    <i className="fas fa-user btn-circle bg-danger text-danger bg-opacity"></i>
                                </article>
                            </article>
                        </article>
                        <article className="col bg-white p-4 rounded-4 shadow-sm flex-column">
                            <div>KDS headline</div>
                            <canvas
                                id="myChart"
                                width="300"
                                height="200"
                            ></canvas>
                        </article>
                        <article className="col bg-white p-4 rounded-4 shadow-sm flex-column gap-3">
                            <article className="justify-content-between w-100">
                                <div className="fw-bold">Best march</div>
                                <a
                                    href="#"
                                    className="btn p-0 fs-9 text-primary"
                                >
                                    view more{" "}
                                    <i className="fas fa-angle-right"></i>
                                </a>
                            </article>
                            <div>Terms to join</div>
                            <article className="gap-3">
                                <div
                                    className="col border-2 rounded-3 border-dark"
                                ></div>
                                <div
                                    className="col border-2 rounded-3 border-dark"
                                ></div>
                            </article>
                            <div>Talent Recruitment</div>
                            <div>Projects</div>
                            <div>Talent to invite to your team</div>
                        </article>
                    </article>
                </section>
            </div>
        </FreelancerLayout>
    );
};

export default Dashboard;
