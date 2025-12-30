import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];

export default function Dashboard() {
    return (
        <AuthenticatedLayout>
            <h1 className='text-2xl font-semibold '>Hallo</h1>
        </AuthenticatedLayout>
    );
}
