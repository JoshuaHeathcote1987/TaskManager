import React, { useState, useEffect } from 'react';
import { Transition } from '@headlessui/react'

export default function FadeIn({ children }) {
    const [isTransitionVisible, setIsTransitionVisible] = useState(false);

    useEffect(() => {
        setIsTransitionVisible(true);
    }, []);

    return (
        <Transition
            show={isTransitionVisible}
            enter="transition-opacity duration-1000"
            enterFrom="opacity-0"
            enterTo="opacity-100"
        >
            {children}
        </Transition>
    );
}