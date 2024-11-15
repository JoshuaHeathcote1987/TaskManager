export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export interface User_Task {
    id: number;
    user_id: number;
    task_id: number;
}

export interface Project {
    id: number;
    title: string;
    description: string;
    dueDate: Date;
    priority: 'Low' | 'Medium' | 'High'; // Use string literals for predefined priority levels
    status: 'To Do' | 'In Progress' | 'Completed'; // Use string literals for task status
    assignedTo: string;
    createdBy: string;
    dateCreated: Date;
    dateModified: Date;
    labels: string[]; // Array of labels/tags
    attachments: string[]; // Array of file paths or URLs
    comments: string[]; // Array of comments/notes
}

export interface Task {
    id: number;
    project_id: number;
    title: string;
    description: string;
    dueDate: Date;
    priority: 'Low' | 'Medium' | 'High'; // Use string literals for predefined priority levels
    status: 'To Do' | 'In Progress' | 'Completed'; // Use string literals for task status
    assignedTo: string;
    createdBy: string;
    dateCreated: Date;
    dateModified: Date;
    labels: string[]; // Array of labels/tags
    attachments: string[]; // Array of file paths or URLs
    comments: string[]; // Array of comments/notes
}

export interface Thread {
    id: number; // Unique identifier for the thread
    Task: number;
    title: string; // Title of the thread
    content: string; // Main content or description of the thread
    author: string; // Name or identifier of the person who created the thread
    createdAt: Date; // Timestamp for when the thread was created
    updatedAt: Date; // Timestamp for when the thread was last updated
    tags: string[]; // Array of tags or categories associated with the thread
    comments: Comment[]; // Array of comments in the thread, using a 'Comment' type
    isPinned: boolean; // Indicates if the thread is pinned to the top
    isLocked: boolean; // Indicates if the thread is locked and cannot be commented on
}

export interface Post {
    id: number; // Unique identifier for the comment
    thread_id: number;
    author: string; // Name or identifier of the person who posted the comment
    content: string; // Content of the comment
    createdAt: Date; // Timestamp for when the comment was created
    updatedAt: Date; // Timestamp for when the comment was last updated
}

export interface Comment {
    id: string; // Unique identifier for the comment
    post_id: number;
    author: string; // Name or identifier of the person who posted the comment
    content: string; // Content of the comment
    createdAt: Date; // Timestamp for when the comment was created
    updatedAt: Date; // Timestamp for when the comment was last updated
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    results: { [key: string]: any }[];
    filters: string[];
};
