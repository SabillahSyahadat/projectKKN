import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
// Tambahkan ekstensi .jsx agar Vite tidak bingung mencari file
import DashboardReact from './components/Dashboard.jsx'; 
import NewsList from './components/NewsList.jsx';
const el = document.getElementById('react-dashboard');
if (el) {
    const props = JSON.parse(el.getAttribute('data-props'));
    ReactDOM.createRoot(el).render(<DashboardReact {...props} />);
}
const newsEl = document.getElementById('react-news-list');
if (newsEl) {
    const props = JSON.parse(newsEl.getAttribute('data-props'));
    ReactDOM.createRoot(newsEl).render(<NewsList {...props} />);
}