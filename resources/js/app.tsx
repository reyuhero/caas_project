require('./bootstrap');

import React from 'react';
import { createInertiaApp } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';
import { createRoot } from 'react-dom/client';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}`),
    setup({ App, props }) {
        const container = document.getElementById('app');
        const root = createRoot(container as HTMLDivElement);
        return root.render(<App {...props} />);
    },
});

InertiaProgress.init({ color: '#4B5563' });
