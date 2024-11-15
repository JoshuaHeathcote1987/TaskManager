import React, { useState, useEffect } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import { BsThreeDots } from 'react-icons/bs';
import { FaSearch, FaFilter, FaSort, FaSortAlphaDownAlt, FaSortAlphaDown } from "react-icons/fa";
import { PiDeviceMobileFill } from "react-icons/pi";
import { MdDesktopWindows } from "react-icons/md";
import { IoHelpBuoy } from "react-icons/io5";
import Dropdown from "@/Components/Dropdown";
import { CreateProject as CreateProjectModal } from "@/Components/TaskManager/Modals/CreateProject";

type Project = { [key: string]: any };

// Utility function to format dates
function formatDate(dateString: string): string {
    const date = new Date(dateString);
    if (isNaN(date.getTime())) return dateString;
    return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')} ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}:${date.getSeconds().toString().padStart(2, '0')}`;
}

export default function Table({ auth, results, filters }: PageProps) {
    const headers = Object.keys(results[0]);
    const [visibleHeaders, setVisibleHeaders] = useState(headers); // Start with all headers visible
    const [sortHeader, setSortHeader] = useState<string | null>(null);
    const [sortOrder, setSortOrder] = useState<'asc' | 'desc' | null>(null);

    // Function to handle visibility toggle for headers
    const handleFilterChange = (header: string) => {
        setVisibleHeaders((prev) =>
            prev.includes(header) ? prev.filter(h => h !== header) : [...prev, header]
        );
    };

    // Sort data based on selected header and order
    const sortedResults = [...results].sort((a, b) => {
        if (!sortHeader) return 0;
        const valueA = a[sortHeader];
        const valueB = b[sortHeader];
    
        if (typeof valueA === 'string' && typeof valueB === 'string') {
            return sortOrder === 'asc' ? valueB.localeCompare(valueA) : valueA.localeCompare(valueB);
        }
        return sortOrder === 'asc' ? valueB - valueA : valueA - valueB;
    });
    

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="flex flex-row justify-between items-center gap-4 pl-4 py-4">
                <div className="flex flex-row justify-start items-center gap-8">
                    <CreateProjectModal />

                    {/* Filter Dropdown */}
                    <Dropdown>
                        <Dropdown.Trigger>
                            <button className="flex flex-col justify-center items-center gap-2 group">
                                <FaFilter className="text-xl" />
                                <div className="group-hover:text-orange-500">Filter</div>
                            </button>
                        </Dropdown.Trigger>
                        <Dropdown.Content align='left' contentClasses='py-1 bg-white w-96'>
                            <div className="p-4 border-b font-semibold">Display Headers</div>
                            <div className="p-4 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-2">
                                {headers.map((header, index) => (
                                    <div key={index} className="flex flex-row justify-between items-center hover:bg-slate-100 p-1 rounded-lg">
                                        <label>{header.substring(0, 8)}</label>
                                        <input
                                            type="checkbox"
                                            checked={visibleHeaders.includes(header)}
                                            onChange={() => handleFilterChange(header)}
                                            className="rounded-md cursor-pointer"
                                        />
                                    </div>
                                ))}
                            </div>
                        </Dropdown.Content>
                    </Dropdown>

                    {/* Sort Dropdown */}
                    <Dropdown>
                        <Dropdown.Trigger>
                            <button className="flex flex-col justify-center items-center gap-2 group">
                                <FaSort className="text-xl" />
                                <div className="group-hover:text-orange-500">Sort</div>
                            </button>
                        </Dropdown.Trigger>
                        <Dropdown.Content align='left' contentClasses='py-1 bg-white w-96'>
                            <div className="p-4 border-b font-semibold">Sort Column ASC</div>
                            <div className="p-4 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-2">
                                {headers.map((header, index) => (
                                    <div key={index} className="flex flex-row justify-between items-center hover:bg-slate-100 p-1 rounded-lg">
                                        <label>{header.substring(0, 8)}</label>
                                        <input
                                            type="radio"
                                            name="sortColumn"
                                            checked={sortHeader === header}
                                            onChange={() => setSortHeader(header)}
                                            className="rounded-md cursor-pointer"
                                        />
                                    </div>
                                ))}
                            </div>
                            {/* <div className="p-4 flex flex-row justify-center gap-12 text-4xl">
                                <button onClick={() => setSortOrder('asc')}>
                                    <FaSortAlphaDownAlt className={`hover:text-orange-500 ${sortOrder === 'asc' && 'text-orange-500'}`} />
                                </button>
                                <button onClick={() => setSortOrder('desc')}>
                                    <FaSortAlphaDown className={`hover:text-orange-500 ${sortOrder === 'desc' && 'text-orange-500'}`} />
                                </button>
                            </div> */}
                        </Dropdown.Content>
                    </Dropdown>

                    <Dropdown>
                        <Dropdown.Trigger>
                            <button className="flex flex-col justify-center items-center gap-2 group">
                                <PiDeviceMobileFill className="text-xl" />
                                <div className="group-hover:text-orange-500">Mobile</div>
                            </button>
                        </Dropdown.Trigger>
                        <Dropdown.Content align='left'>
                            <div className="p-4">Mobile view settings here...</div>
                        </Dropdown.Content>
                    </Dropdown>

                    <Dropdown>
                        <Dropdown.Trigger>
                            <button className="flex flex-col justify-center items-center gap-2 group">
                                <MdDesktopWindows className="text-xl" />
                                <div className="group-hover:text-orange-500">Desktop</div>
                            </button>
                        </Dropdown.Trigger>
                        <Dropdown.Content align='left'>
                            <div className="p-4">Desktop view settings here...</div>
                        </Dropdown.Content>
                    </Dropdown>

                    <button className="flex flex-col justify-center items-center gap-2 group">
                        <IoHelpBuoy className="text-xl" />
                        <div className="group-hover:text-orange-500">Help</div>
                    </button>
                </div>

                {/* Search */}
                <div className="flex flex-row justify-end items-center gap-4">
                    <input
                        className="rounded-lg border border-gray-300 p-2 focus:outline-none"
                        type="text"
                        placeholder="Search..."
                        aria-label="Search input"
                    />
                    <button
                        className="flex flex-row justify-center items-center rounded-lg p-3 border border-slate-500 w-12 hover:text-orange-500"
                        aria-label="Search button"
                    >
                        <FaSearch />
                    </button>
                </div>
            </div>

            {/* Table */}
            <div className="overflow-hidden shadow rounded-lg">
                <table className="min-w-full divide-y divide-gray-200">
                    <thead className="bg-gray-100">
                        <tr>
                            {visibleHeaders.map((header, index) => (
                                <th key={index} className="px-4 py-2 font-semibold text-sm uppercase tracking-wider text-gray-700 text-left">
                                    {header}
                                </th>
                            ))}
                            <th className="px-4 py-2 font-semibold text-sm uppercase tracking-wider text-gray-700 text-left">
                                Options
                            </th>
                        </tr>
                    </thead>
                    <tbody className="bg-white divide-y divide-gray-200">
                        {sortedResults.length > 0 ? (
                            sortedResults.map((result, index) => (
                                <tr key={index} className="hover:bg-gray-50">
                                    {visibleHeaders.map((header, i) => (
                                        <td key={i} className="px-4 py-2 text-gray-700">
                                            {result[header]}
                                        </td>
                                    ))}
                                    <td className="px-4 py-2 text-center"><BsThreeDots /></td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan={visibleHeaders.length} className="px-4 py-2 text-center text-gray-500">
                                    There are currently no projects.
                                </td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>

        </AuthenticatedLayout>
    );
}
