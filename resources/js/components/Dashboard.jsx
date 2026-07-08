import React, { useState, useEffect } from 'react';
import { motion } from 'framer-motion';

const DashboardReact = ({ countWarga, countBerita }) => {
    // Animasi masuk yang halus (Fade & Slide Up)
    const containerVariants = {
        hidden: { opacity: 0 },
        show: { 
            opacity: 1, 
            transition: { staggerChildren: 0.1, delayChildren: 0.2 } 
        }
    };

    const itemVariants = {
        hidden: { opacity: 0, y: 30 },
        show: { opacity: 1, y: 0, transition: { type: "spring", stiffness: 80, damping: 20 } }
    };

    return (
        <motion.div 
            variants={containerVariants} 
            initial="hidden" 
            animate="show" 
            className="container-fluid px-4 py-4"
            style={{ minHeight: '80vh' }}
        >
            {/* 1. Header Section - Minimalist & Airy */}
            <motion.div variants={itemVariants} className="mb-5 mt-3">
                <div className="row align-items-center">
                    <div className="col">
                        <h6 className="text-uppercase fw-bold text-primary mb-2" style={{ letterSpacing: '3px', fontSize: '0.75rem' }}>
                            Sistem Informasi Desa
                        </h6>
                        <h1 className="fw-extrabold text-dark display-5 mb-2" style={{ letterSpacing: '-2px' }}>
                            Selamat Datang, Admin <span className="text-primary">.</span>
                        </h1>
                        <p className="text-muted fw-medium opacity-60">
                            {new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}
                        </p>
                    </div>
                </div>
            </motion.div>

            {/* 2. Stat Cards - High End Professional Look */}
            <div className="row g-4 mt-2">
                <StatCard 
                    title="Total Populasi" 
                    value={countWarga || 0} 
                    icon="bi-people" 
                    subtitle="Warga terdaftar di sistem"
                    color="#4f46e5" 
                    delay={0.1}
                />
                <StatCard 
                    title="Informasi Desa" 
                    value={countBerita || 0} 
                    icon="bi-journal-text" 
                    subtitle="Berita & Pengumuman aktif"
                    color="#ef4444" 
                    delay={0.2}
                />
                <StatCard 
                    title="Layanan Selesai" 
                    value={12} 
                    icon="bi-shield-check" 
                    subtitle="Permohonan surat diproses"
                    color="#10b981" 
                    delay={0.3}
                />
            </div>
        </motion.div>
    );
};

const StatCard = ({ title, value, icon, subtitle, color, delay }) => (
    <div className="col-lg-4">
        <motion.div 
            variants={{ hidden: { opacity: 0, y: 20 }, show: { opacity: 1, y: 0 } }}
            whileHover={{ y: -12 }}
            className="card border-0 h-100 position-relative"
            style={{ 
                borderRadius: '35px', 
                background: '#ffffff',
                boxShadow: '0 25px 50px -12px rgba(0, 0, 0, 0.05)',
                transition: 'all 0.4s ease-in-out',
                overflow: 'hidden'
            }}
        >
            <div className="card-body p-5">
                {/* Minimalist Icon with Soft Circle */}
                <div className="d-inline-flex align-items-center justify-content-center mb-4"
                     style={{ 
                         width: '65px', 
                         height: '65px', 
                         borderRadius: '22px', 
                         background: `${color}10`, // 10% opacity of the color
                         color: color 
                     }}>
                    <i className={`bi ${icon} fs-2`}></i>
                </div>
                
                <h6 className="text-muted fw-bold text-uppercase mb-2" style={{ letterSpacing: '1.5px', fontSize: '0.7rem' }}>
                    {title}
                </h6>
                <h1 className="fw-extrabold mb-2 text-dark" style={{ fontSize: '3.5rem', letterSpacing: '-3px' }}>
                    <Counter value={value} />
                </h1>
                <p className="text-muted small mb-0 opacity-70">{subtitle}</p>

                {/* Subtle Geometric Decoration (No Bug UC) */}
                <div className="position-absolute" style={{ 
                    bottom: '-20px', 
                    right: '-20px', 
                    width: '120px', 
                    height: '120px', 
                    background: `${color}05`, 
                    borderRadius: '50%',
                    zIndex: 0 
                }}></div>
            </div>
        </motion.div>
    </div>
);

const Counter = ({ value }) => {
    const [displayValue, setDisplayValue] = useState(0);
    useEffect(() => {
        let start = 0;
        const end = parseInt(value);
        if (isNaN(end) || end === 0) return;
        
        const timer = setInterval(() => {
            start += Math.ceil(end / 30);
            if (start >= end) {
                setDisplayValue(end);
                clearInterval(timer);
            } else {
                setDisplayValue(start);
            }
        }, 40);
        return () => clearInterval(timer);
    }, [value]);
    return <span>{displayValue.toLocaleString('id-ID')}</span>;
};

export default DashboardReact;