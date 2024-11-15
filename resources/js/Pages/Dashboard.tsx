import React, { useState } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';

import { Button } from '@/Components/TaskManager/Components/Button';
import { Contact } from '@/Components/TaskManager/Components/Contact';
import { Percentage } from '@/Components/TaskManager/Components/Percentage';

import Calendar from '@/Components/TaskManager/Components/Calendar';

import { FaBeer } from 'react-icons/fa';

export default function Dashboard({ auth }: PageProps) {

    
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div className="flex flex-col space-y-4">
                                <div className="text-xl text-gray-800 leading-tight font-semibold">Team Online</div>
                                <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <Contact forename="Jason" surname="Duffy" img="/images/teenager.png" email="joshuaheathcote1987@gmail.com" telephone="07756345432" />
                                    <Contact forename="Kyleigh" surname="Bradford" img="/images/girl.png" email="joshuaheathcote1987@gmail.com" telephone="07756345432" />
                                    <Contact forename="Adler" surname="Norton" img="/images/guy.png" email="joshuaheathcote1987@gmail.com" telephone="07756345432" />
                                </div>
                            </div>
                            <div className="flex flex-col space-y-4">
                                <div className="text-xl text-gray-800 leading-tight font-semibold">Quick Overview</div>
                                <div className="flex flex-row">
                                    <div className="flex flex-col w-full space-y-4">
                                        <Percentage name="Community Connector" percentage={25} color="bg-purple-300" />
                                        <Percentage name="Neighborhood Network" percentage={65} color="bg-blue-300" />
                                        <Percentage name="Local Link" percentage={45} color="bg-red-300" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="flex flex-col space-y-4">
                            <div className="text-xl text-gray-800 leading-tight font-semibold">Calendar</div>
                            <Calendar />
                        </div>
                    
        </AuthenticatedLayout>
    );
}
