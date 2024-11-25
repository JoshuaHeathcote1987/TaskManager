import { PrimeReactProvider } from 'primereact/api';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { Table } from '@/Components/Table';
import { DashboardNavigation } from '@/Components/DashboardNavigation';

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

// Update TableProps to use the User type for the user property
interface TableProps {
    url: string;
    auth: {
        user: User;
    };
    results: { [key: string]: any }[];
    fields: any[];
}

export default function Projects({ auth, url = "", results = [], fields = [] }: TableProps) {
    return (
        <PrimeReactProvider>
            <AuthenticatedLayout
                user={auth.user}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
            >
                <Head title="Dashboard" />
                <DashboardNavigation />
                <Table url={url} results={results} fields={fields} />
            </AuthenticatedLayout>
        </PrimeReactProvider>
    );
}