import React from 'React'

function Content({ children }) {
    return (
        <main className="d-flex flex-column justify-content-center position-relative mx-3 p-3">
            {children}
        </main>
    )
}

export default Content;
