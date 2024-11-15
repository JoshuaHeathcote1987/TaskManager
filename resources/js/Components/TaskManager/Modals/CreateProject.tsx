import React, { useState } from 'react';
import Modal from '@/Components/Modal';
import { IoIosAddCircle } from "react-icons/io";
export function CreateProject({ initialOpen = false }) {
    const [isOpen, setIsOpen] = useState(initialOpen);

    const [formData, setFormData] = useState({
        name: '',
        description: '',
        status: 'Active',
        start_date: '',
        end_date: '',
        owner_id: '',
    });

    const handleInputChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement | HTMLTextAreaElement>) => {
        const { name, value } = e.target;
        setFormData((prevData) => ({ ...prevData, [name]: value }));
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        console.log('Form Data:', formData);
        closeModal();
    };

    const openModal = () => setIsOpen(true);
    const closeModal = () => setIsOpen(false);

    return (
        <>
            <button onClick={openModal} className="flex flex-col justify-center items-center gap-2 group">
                <IoIosAddCircle className="0 text-xl" />
                <div className="group-hover:text-orange-500">Create</div>
            </button>

            <Modal show={isOpen} onClose={closeModal}>
                <form onSubmit={handleSubmit} className="p-6 bg-white rounded shadow-lg mx-auto">
                    <div className="flex justify-between items-center mb-4">
                        <h2 className="text-lg font-bold">Create New Project</h2>
                        <button onClick={closeModal} aria-label="Close modal" className="text-gray-500 hover:text-orange-500 text-2xl">
                            &times;
                        </button>
                    </div>

                    <div className="mb-4">
                        <label className="block text-sm font-medium text-gray-700">Project Name</label>
                        <input
                            type="text"
                            name="name"
                            value={formData.name}
                            onChange={handleInputChange}
                            required
                            className="w-full p-2 border rounded mt-1"
                            placeholder="Enter project name"
                        />
                    </div>

                    <div className="mb-4">
                        <label className="block text-sm font-medium text-gray-700">Description</label>
                        <textarea
                            name="description"
                            value={formData.description}
                            onChange={handleInputChange}
                            className="w-full p-2 border rounded mt-1"
                            placeholder="Enter project description"
                        />
                    </div>

                    <div className="mb-4">
                        <label className="block text-sm font-medium text-gray-700">Status</label>
                        <select
                            name="status"
                            value={formData.status}
                            onChange={handleInputChange}
                            className="w-full p-2 border rounded mt-1"
                            required
                        >
                            <option value="Active">Active</option>
                            <option value="Completed">Completed</option>
                            <option value="Archived">Archived</option>
                        </select>
                    </div>

                    <div className="mb-4">
                        <label className="block text-sm font-medium text-gray-700">Start Date</label>
                        <input
                            type="date"
                            name="start_date"
                            value={formData.start_date}
                            onChange={handleInputChange}
                            className="w-full p-2 border rounded mt-1"
                        />
                    </div>

                    <div className="mb-4">
                        <label className="block text-sm font-medium text-gray-700">End Date</label>
                        <input
                            type="date"
                            name="end_date"
                            value={formData.end_date}
                            onChange={handleInputChange}
                            className="w-full p-2 border rounded mt-1"
                        />
                    </div>

                    <div className="flex justify-end">
                        <button type="submit" className="rounded-lg border p-2 w-32 hover:text-orange-500">
                            Save
                        </button>
                    </div>
                </form>
            </Modal>
        </>
    );
}
