import Nav from '@/components/Nav';
import Shape from '@/components/shape';
import ShapeCircle from '@/components/shape-circle';
import Spinner from '@/components/Spinner';
import { Link, useForm } from '@inertiajs/inertia-react';
import React, { ChangeEvent, useEffect } from 'react';
import route from 'ziggy-js';

const SignUp = () => {
    const { data, errors, post, processing, reset, setData }= useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    })
    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        }
    },[]);
    const onHandleChange = (event: ChangeEvent<HTMLInputElement>) => {
        setData(event.target.name as "name" |"email" | "password" | 'password_confirmation' , event.target.type === 'checkbox' ? event.target.checked + "" : event.target.value);
    }
    const submit = (e: React.SyntheticEvent) => {
        e.preventDefault();
        post(route('register'))
        console.log(errors);
    }
    return (
        <>
        <Nav>
            <Link href='/'><div className="ps-3 fs-2 fw-bold btn m-0 p-0">CAAS</div></Link>
            <div className="fs-7">
                Already have an account? <a href={route('signin')} className="link-dark fw-bold px-2">Log in</a>
            </div>
        </Nav>
    <main
      className="d-flex flex-column justify-content-center position-relative m-3 px-md-5"
    >
      <Shape/>
      <ShapeCircle/>

      <form
        onSubmit={submit}
        className="bg-white border border-white col col-lg-4 col-lg-7 col-md-9 col-xl-6 d-flex flex-column justify-content-center mx-1 mx-auto rounded-5 shadow-md text-center z-2 bg-opacity"
      >
      <div className="d-flex flex-column col-12 pt-5 px-4">
        <h2 className="fw-bold">
          Sign up as an Independent
        </h2>
        <h6 className="text-black-50 fw-light col-sm-9 col-md-12 px-3 mx-auto">Not looking to get hired? Sign up as client <i className="fas fa-info-circle"></i>
        </h6>
      </div>
        <div className="col-12 col-md-8 mx-auto px-md-5 px-3 pt-3">

        <article className="flex-column gap-2">
            <div className="border border-gray form-group ryo-rounded-top text-start bg-white rem-8">
                <label htmlFor="name" className="badge fw-light p-1 px-3 text-dark opacity-75">Name</label>
                <input
                    type="name"
                    value={data.name}
                    id="name"
                    name='name'
                    onChange={onHandleChange}
                    className="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
            </div>
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
            <div className="border border-gray form-group ryo-rounded-top text-start bg-white rem-8">
                <label htmlFor="password_confirmation" className="badge fw-light p-1 px-3 text-dark opacity-75">Password confirmation</label>
                <input
                    type="password"
                    id="password_confirmation"
                    value={data.password_confirmation}
                    name='password_confirmation'
                    onChange={onHandleChange}
                    className="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
            </div>
        </article>
        <button disabled={processing} className="btn btn-warning rounded-pill fw-bold mt-3 pb-2 px-5 w-100" type="submit">
            {processing ? <Spinner/> : 'Register'}
        </button>
          <div
            className="d-flex position-relative align-items-center justify-content-center my-3"
          >
            <hr className="opacity-2 w-100 position-absolute z-1" />
            <div className="bg-white text-center z-2 px-2 p-0 badge text-black">
              OR
            </div>
          </div>
          <div className="d-grid col mx-auto">
            <a
              href="#"
              className="btn btn-light rounded-pill fw-bold py-2 px-3"
              type="submit"
            >
              <i className="fab fa-google"></i> Continue with Google
            </a>
          </div>
        </div>
        <div className="mt-5 border-top p-3 text-black-50 py-4 fs-8">
          By continuing, you agree to Contra's <a href="#" className="text-dark fw-bold">Terms of Use</a> and confirm that you have read Contra's <a href="#" className="text-dark fw-bold">Privacy Policy</a>
        </div>
      </form>

    </main>
    </>
    )
}
export default SignUp;
