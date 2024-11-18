import { Link, Head } from '@inertiajs/react';
import { PageProps } from '@/types';

import { PlaySound } from '@/Components/TaskManager/Components/PlaySound';

import { Logo } from '@/Components/TaskManager/Components/Logo';

import FadeIn from '@/Layouts/FadeIn';

export default function Welcome({ auth, laravelVersion, phpVersion }: PageProps<{ laravelVersion: string, phpVersion: string }>) {
    return (
        <>
            <Head title="Welcome" />
            <PlaySound source="/sounds/intro.mp3" />
            {/* <PlaySound source="/sounds/flute.mp3" /> */}

            <div className="selection:bg-red-500 selection:text-white text-black dark:text-white bg-gray-100 dark:bg-gray-900">
                <div className="flex flex-row justify-between items-center space-x-4 p-4">
                    <div className="font-bold">
                        Flow-Focus
                    </div>
                    <div className="flex flex-row justify-between items-center space-x-4">
                        <Link className={`hover:underline cursor-pointer ${auth.user != null ? 'hidden' : 'show'}`} href="/login">
                            Login
                        </Link>
                        <Link className={`hover:underline cursor-pointer ${auth.user != null ? 'hidden' : 'show'}`} href="/register">
                            Sign-up
                        </Link>
                        <Link className={`hover:underline cursor-pointer ${auth.user != null ? 'show' : 'hidden'}`} href="/dashboard">
                            Dashboard
                        </Link>
                    </div>
                </div>
                <div className="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center ">
                    <Logo size="w-1/3" />
                </div>
            </div>
        </>
    );
}
