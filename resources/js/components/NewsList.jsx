import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import Swal from 'sweetalert2';
import axios from 'axios'; // Menggunakan Axios untuk request yang lebih stabil

const NewsList = ({ beritas, addRoute, storagePath }) => {
    const [searchTerm, setSearchTerm] = useState("");
    const [localBeritas, setLocalBeritas] = useState(beritas); // Simpan di state agar tampilan langsung update

    const filteredBeritas = localBeritas.filter(item => 
        item.nama_berita.toLowerCase().includes(searchTerm.toLowerCase())
    );

    const handleDelete = (id) => {
        Swal.fire({
            title: 'Hapus Berita?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ambil CSRF Token dari meta tag head
                const token = document.head.querySelector('meta[name="csrf-token"]')?.content;

                axios.delete(`/admin/berita/${id}`, {
                    headers: { 'X-CSRF-TOKEN': token }
                })
                .then(response => {
                    // Update tampilan secara instan tanpa reload page
                    setLocalBeritas(localBeritas.filter(item => item.id !== id));
                    Swal.fire('Terhapus!', 'Berita telah berhasil dihapus.', 'success');
                })
                .catch(error => {
                    console.error("Error:", error.response);
                    Swal.fire('Gagal!', 'Terjadi kesalahan atau masalah izin.', 'error');
                });
            }
        });
    };

    return (
        <div className="container-fluid px-0" style={{ minHeight: '100vh', background: '#fcfcfd' }}>
            {/* Header */}
            <div className="row mb-5 pt-4">
                <div className="col-lg-7">
                    <motion.div initial={{ opacity: 0, x: -30 }} animate={{ opacity: 1, x: 0 }}>
                        <h1 className="fw-extra-bold display-5 mb-2 text-dark" style={{ letterSpacing: '-1.5px' }}>
                            Berita Desa <span className="text-danger">Sidomulyo</span>
                        </h1>
                        <p className="text-muted fs-5 mb-0">Kelola narasi dan informasi desa.</p>
                    </motion.div>
                </div>
                <div className="col-lg-5 mt-4 mt-lg-0 d-flex align-items-center">
                    <div className="position-relative w-100 shadow-sm rounded-pill overflow-hidden">
                        <input 
                            type="text" 
                            className="form-control border-0 ps-4 py-3" 
                            placeholder="Cari berita..." 
                            onChange={(e) => setSearchTerm(e.target.value)}
                        />
                    </div>
                </div>
            </div>

            {/* Grid Berita */}
            <motion.div className="row g-4 pb-5">
                <AnimatePresence mode='popLayout'>
                    {filteredBeritas.length > 0 ? (
                        filteredBeritas.map((item) => (
                            <NewsCard 
                                key={item.id} 
                                item={item} 
                                storagePath={storagePath} 
                                onDelete={() => handleDelete(item.id)} 
                            />
                        ))
                    ) : (
                        <div className="col-12 text-center py-5">
                            <h3 className="text-muted">Berita tidak ditemukan...</h3>
                        </div>
                    )}
                </AnimatePresence>
            </motion.div>

            {/* Floating Action Button */}
            <motion.a 
                whileHover={{ scale: 1.1 }}
                whileTap={{ scale: 0.9 }}
                href={addRoute}
                className="btn btn-danger shadow-lg d-flex align-items-center justify-content-center"
                style={{ 
                    position: 'fixed', bottom: '40px', right: '40px', 
                    width: '65px', height: '65px', borderRadius: '50%', zIndex: 1000 
                }}
            >
                <i className="bi bi-plus-lg fs-2"></i>
            </motion.a>
        </div>
    );
};

const NewsCard = ({ item, storagePath, onDelete }) => {
    const imgUrl = item.gambar_berita 
        ? `${storagePath}/${item.gambar_berita}` 
        : `${storagePath}/uploads/berita/template.png`;

    return (
        <motion.div 
            layout
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            exit={{ opacity: 0, scale: 0.9 }}
            className="col-lg-4 col-md-6"
        >
            <div className="card border-0 shadow-lg h-100 overflow-hidden" style={{ borderRadius: '30px' }}>
                <div className="position-relative" style={{ height: '240px' }}>
                    <img src={imgUrl} className="w-100 h-100" style={{ objectFit: 'cover' }} alt="" />
                    <div className="position-absolute top-0 end-0 p-3">
                        <span className="badge bg-dark opacity-75 rounded-pill">#{item.id}</span>
                    </div>
                </div>
                <div className="card-body p-4">
                    <h5 className="fw-bold text-dark">{item.nama_berita}</h5>
                    <p className="text-muted small">
                        {item.isi_berita ? item.isi_berita.substring(0, 80).replace(/<[^>]*>?/gm, '') : ''}...
                    </p>
                    <div className="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                        <a href={`/admin/berita/${item.slug}`} className="btn btn-sm text-danger fw-bold p-0">BACA</a>
                        <div className="d-flex gap-2">
                            <a href={`/admin/berita/${item.id}/edit`} className="btn btn-light btn-sm rounded-circle shadow-sm">
                                <i className="bi bi-pencil text-primary"></i>
                            </a>
                            <button onClick={onDelete} className="btn btn-light btn-sm rounded-circle shadow-sm">
                                <i className="bi bi-trash text-danger"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </motion.div>
    );
};

export default NewsList;