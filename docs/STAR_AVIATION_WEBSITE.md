# Star Aviation Website Specification

## Project Goal
Build a professional, dynamic website for **Star Aviation**, an aviation services company. The site should be modern, responsive, and user-friendly.

## Core Stack
- **Frontend:** React.js, TailwindCSS, shadcn/ui, React Router, Framer Motion
- **Backend:** Node.js (Express) with Prisma ORM
- **Database:** MySQL (local via XAMPP/phpMyAdmin initially)
- **Authentication:** JWT with role-based access control (Admin, Editor, Staff)

## Public Pages & Features
- **Home:** Hero banner, company overview, call-to-action (Request Jet Fuel), highlights, latest news
- **Services:** Listing of aviation services
- **Request Fuel:** Form fields include name, company, email, phone, airport code, aircraft type, fuel type, quantity, date, and notes
- **About Us:** Company profile, certifications, safety and quality standards
- **Contact Us:** Form with name, email, subject, and message
- **News/Blog:** Dynamic list of company updates and aviation news
- **Single News Post:** Dedicated page per article

## Admin Panel (Secured)
- **Authentication:** Login and logout
- **Dashboard:** Key performance indicators (fuel request count, new messages, drafts)
- **Manage Posts:** Create, edit, delete, publish, or draft news/blog posts
- **Manage Services:** Add, edit, delete services
- **Fuel Requests:** Table of requests with status updates (NEW, APPROVED, REJECTED)
- **Contact Messages:** View and mark messages as handled
- **User Management:** Create admin, editor, and staff accounts

## Design Guidelines
- Clean, aviation-inspired style using blue, white, and gray with modern typography
- Mobile-first responsive layout
- Smooth animations for transitions using Framer Motion
- SEO-ready with meta tags, sitemap, and OpenGraph support

## Security
- Validate inputs using Zod
- Rate-limit public forms
- Store passwords hashed with bcrypt
- Use JWT (httpOnly cookies) for sessions
- Protect admin routes with role-based access control

## Deployment (Future)
- **Frontend:** Vercel or Netlify
- **Backend:** Render, Railway, or AWS
- **Database:** Managed MySQL
