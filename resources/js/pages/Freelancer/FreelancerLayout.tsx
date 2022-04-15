import { Head } from '@inertiajs/inertia-react'
import React from 'React'
import Headers from '@/pages/freelancer/Headers'
import Content from '@/pages/freelancer/Content'

const FreelancerLayout = ({ children, title }) => {
    return (
        <>
            <Head title='Dashboard Freelancer' />
            <Headers title={title}/>
            <Content>
                {children}
            </Content>
        </>
    )
}

export default FreelancerLayout
