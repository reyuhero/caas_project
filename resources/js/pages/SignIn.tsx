import Shape from '@/components/shape';
import ShapeCircle from '@/components/shape-circle';
import React, { ChangeEvent, SyntheticEvent, useEffect } from 'react';
import { Link, useForm } from '@inertiajs/inertia-react';
import route from 'ziggy-js';
import Nav from '@/components/Nav';
import Spinner from '@/components/Spinner';
interface Props {
    status:string;
    canResetPassword:boolean;
}
const SignIn = ({ status, canResetPassword}: Props) => {
    const { data, setData, post, processing, errors, reset} = useForm({
        email: '',
        password: '',
        remember: 1,
    })
    useEffect(() => {
        return () => {
            reset('password');
        }
    },[]);

    const onHandleChange = (event: ChangeEvent<HTMLInputElement>) => {
        setData(event.target.name as "email" | "password" | "remember", event.target.type === 'checkbox' ? event.target.checked + "" : event.target.value);
    }
    const submit = (e: SyntheticEvent) => {
        e.preventDefault();
        post(route('login'));
        console.log("password",errors.password);
    }

    return (
        <>
            <Nav>
                <Link href='/'><div className="ps-3 fs-2 fw-bold btn m-0 p-0">CAAS</div></Link>
            </Nav>
            <main className="d-flex flex-column justify-content-center position-relative m-3 px-md-5">
                <Shape />
                <ShapeCircle />
                <form
                    onSubmit={submit}
                    className="bg-white border bg-opacity border-white col col-lg-4 col-lg-7 col-md-9 col-xl-6 d-flex flex-column justify-content-center mx-1 mx-auto rounded-5 shadow-md text-center z-2">
                    <div className="col-12 col-md-11 mx-auto px-md-5 px-3 py-5">
                        <h2 className="mb-5 fw-bold">Welcome back to CAAS</h2>
                        <article className="flex-column gap-2">
                            <div className="border border-gray form-group ryo-rounded-top text-start bg-white rem-8">
                                <label htmlFor="email" className="badge fw-light p-1 px-3 text-dark opacity-75">Email</label>
                                <input
                                    type="email"
                                    value={data.email}
                                    id="email"
                                    name='email'
                                    onChange={onHandleChange}
                                    className="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
                            </div>
                            <div className="border border-gray form-group ryo-rounded-top text-start bg-white rem-8">
                                <label htmlFor="password" className="badge fw-light p-1 px-3 text-dark opacity-75">Password</label>
                                <input
                                    type="password"
                                    id="password"
                                    value={data.password}
                                    name='password'
                                    onChange={onHandleChange}
                                    className="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
                            </div>
                            <div className="form-check">
                                <input type="checkbox" id='remember' className='form-check-input' name='remember' value={data.remember}/>
                                <label htmlFor='remember' className='form-check-label'>Remember me</label>
                            </div>
                        </article>
                        <button disabled={processing} className="btn btn-warning rounded-pill fw-bold mt-3 pb-2 px-5 w-100" type="submit">
                            {processing ? <Spinner/> : 'Log In'}
                        </button>
                        <div className="d-flex position-relative align-items-center justify-content-center my-3">
                            <hr className="opacity-2 w-100 position-absolute z-1" />
                            <div className="bg-white text-center z-2 px-2 p-0 badge text-black">OR</div>
                        </div>
                        <div className="d-grid col mx-auto">
                            <a href={''} className="btn btn-light rounded-pill fw-bold py-2 px-3 " type="submit">
                                <i className="fab fa-google"></i> Log in with Google
                            </a>
                        </div>
                    </div>
                </form>
                <div className="d-flex flex-column justify-content-center mt-5  mx-auto">
                    <div className="col col-md-6 mx-auto">
                        <p className="text">
                            <b>New To Contra?</b> Contra is a new professional network for
                            flexible work. Build your career around the life you want
                        </p>
                    </div>
                    <a href={route("signup")} className="btn btn-dark p-2 rounded-pill w-auto px-3 fw-bold mx-auto">Sign up</a>
                </div>
            </main>
        </>
    )
}
export default SignIn;
