import { Head } from '@inertiajs/react';
import { Card, CardContent } from '@/components/ui/card';
import { Button } from '@/components/ui/button';

// Dummy data - replace with real API calls later
const packages = [
    {
        id: 1,
        name: "Bali Paradise",
        description: "Experience the magical beauty of Bali with pristine beaches, ancient temples, and vibrant culture.",
        price: 1299,
        image: "https://images.unsplash.com/photo-1537953773345-d172ccf13cf1?w=400&h=300&fit=crop"
    },
    {
        id: 2,
        name: "Tokyo Adventure",
        description: "Discover the perfect blend of traditional and modern Japan in the bustling metropolis of Tokyo.",
        price: 1899,
        image: "https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=400&h=300&fit=crop"
    },
    {
        id: 3,
        name: "Swiss Alps Retreat",
        description: "Breathtaking mountain views, pristine lakes, and charming villages await in Switzerland.",
        price: 2299,
        image: "https://images.unsplash.com/photo-1531366936337-7c912a4589a7?w=400&h=300&fit=crop"
    },
    {
        id: 4,
        name: "Santorini Sunset",
        description: "Romantic white-washed villages, stunning sunsets, and crystal-clear waters of the Aegean Sea.",
        price: 1799,
        image: "https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?w=400&h=300&fit=crop"
    }
];

const testimonials = [
    {
        id: 1,
        author: "Sarah Johnson",
        text: "Amazing experience! The team organized everything perfectly. Our Bali trip was unforgettable.",
        photo: "https://images.unsplash.com/photo-1494790108755-2616b612b786?w=80&h=80&fit=crop&crop=face"
    },
    {
        id: 2,
        author: "Mike Chen",
        text: "Professional service and attention to detail. The Tokyo adventure exceeded all our expectations!",
        photo: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face"
    },
    {
        id: 3,
        author: "Emily Rodriguez",
        text: "From booking to landing, everything was seamless. Highly recommend for your next vacation!",
        photo: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=80&h=80&fit=crop&crop=face"
    }
];

const gallery = [
    {
        id: 1,
        image: "https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=400&h=300&fit=crop",
        caption: "Mountain Adventures"
    },
    {
        id: 2,
        image: "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop",
        caption: "Beach Paradise"
    },
    {
        id: 3,
        image: "https://images.unsplash.com/photo-1539650116574-75c0c6d73a6e?w=400&h=300&fit=crop",
        caption: "City Exploration"
    },
    {
        id: 4,
        image: "https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=300&fit=crop",
        caption: "Cultural Heritage"
    },
    {
        id: 5,
        image: "https://images.unsplash.com/photo-1511593358241-7eea1f3c84e5?w=400&h=300&fit=crop",
        caption: "Desert Wonders"
    },
    {
        id: 6,
        image: "https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=400&h=300&fit=crop",
        caption: "Lake Serenity"
    }
];

export default function Welcome() {

    return (
        <>
            <Head title="MDR Tours - Your Travel Adventure Awaits">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link
                    href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
                    rel="stylesheet"
                />
            </Head>
            
            <div className="min-h-screen bg-gray-50">
                {/* Navigation */}
                <nav className="bg-white shadow-sm">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex justify-between items-center py-4">
                            <div className="flex items-center">
                                <h2 className="text-2xl font-bold text-blue-600">MDR Tours</h2>
                            </div>
                            <div className="flex items-center space-x-6">
                                <a href="#packages" className="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                                    Packages
                                </a>
                                <a href="#gallery" className="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                                    Gallery
                                </a>
                                <a href="#testimonials" className="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                                    Reviews
                                </a>
                                <a href="#contact" className="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                                    Contact
                                </a>
                                <Button className="bg-orange-500 hover:bg-orange-600 text-white">
                                    Book Now
                                </Button>
                            </div>
                        </div>
                    </div>
                </nav>

                {/* Hero Section */}
                <section className="relative bg-gradient-to-r from-blue-600 to-purple-700 text-white">
                    <div className="absolute inset-0 bg-black bg-opacity-30"></div>
                    <div 
                        className="relative bg-cover bg-center bg-blend-overlay"
                        style={{
                            backgroundImage: "url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=1920&h=800&fit=crop')"
                        }}
                    >
                        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
                            <div className="text-center">
                                <h1 className="text-4xl md:text-6xl font-bold mb-6">
                                    Your Adventure Awaits
                                </h1>
                                <p className="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                                    Discover the world's most beautiful destinations with our expertly crafted travel packages. 
                                    Create memories that will last a lifetime.
                                </p>
                                <Button size="lg" className="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 text-lg">
                                    Explore Packages
                                </Button>
                            </div>
                        </div>
                    </div>
                </section>

                {/* Packages Section */}
                <section id="packages" className="py-16 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center mb-12">
                            <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                Featured Packages
                            </h2>
                            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
                                Choose from our carefully selected travel packages designed to give you 
                                the best experience at every destination.
                            </p>
                        </div>
                        
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                            {packages.map((pkg) => (
                                <Card key={pkg.id} className="overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                                    <div className="relative overflow-hidden">
                                        <img 
                                            src={pkg.image} 
                                            alt={pkg.name}
                                            className="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300"
                                        />
                                    </div>
                                    <CardContent className="p-6">
                                        <h3 className="text-xl font-semibold text-gray-900 mb-2">{pkg.name}</h3>
                                        <p className="text-gray-600 mb-4 text-sm">{pkg.description}</p>
                                        <div className="flex justify-between items-center">
                                            <span className="text-2xl font-bold text-blue-600">
                                                ${pkg.price}
                                            </span>
                                            <Button size="sm" className="bg-orange-500 hover:bg-orange-600">
                                                View Details
                                            </Button>
                                        </div>
                                    </CardContent>
                                </Card>
                            ))}
                        </div>
                    </div>
                </section>

                {/* Testimonials Section */}
                <section id="testimonials" className="py-16 bg-gray-50">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center mb-12">
                            <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                What Our Travelers Say
                            </h2>
                            <p className="text-lg text-gray-600">
                                Real experiences from real travelers
                            </p>
                        </div>
                        
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                            {testimonials.map((testimonial) => (
                                <Card key={testimonial.id} className="bg-white p-6 hover:shadow-lg transition-shadow duration-300">
                                    <CardContent className="p-0">
                                        <div className="flex items-center mb-4">
                                            <img 
                                                src={testimonial.photo} 
                                                alt={testimonial.author}
                                                className="w-12 h-12 rounded-full mr-4"
                                            />
                                            <div>
                                                <h4 className="font-semibold text-gray-900">{testimonial.author}</h4>
                                                <div className="flex text-yellow-400">
                                                    {"★★★★★"}
                                                </div>
                                            </div>
                                        </div>
                                        <p className="text-gray-600 italic">"{testimonial.text}"</p>
                                    </CardContent>
                                </Card>
                            ))}
                        </div>
                    </div>
                </section>

                {/* Gallery Section */}
                <section id="gallery" className="py-16 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center mb-12">
                            <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                Travel Gallery
                            </h2>
                            <p className="text-lg text-gray-600">
                                Glimpses of the amazing destinations we offer
                            </p>
                        </div>
                        
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {gallery.map((item) => (
                                <div key={item.id} className="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                                    <img 
                                        src={item.image} 
                                        alt={item.caption}
                                        className="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300"
                                    />
                                    <div className="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-end">
                                        <div className="p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            <h4 className="text-lg font-semibold">{item.caption}</h4>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </section>

                {/* Call to Action Section */}
                <section className="py-16 bg-gradient-to-r from-blue-600 to-purple-700 text-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                        <h2 className="text-3xl md:text-4xl font-bold mb-4">
                            Ready to Start Your Journey?
                        </h2>
                        <p className="text-xl mb-8 max-w-2xl mx-auto">
                            Join thousands of satisfied travelers who have discovered the world with MDR Tours. 
                            Your next adventure is just a click away.
                        </p>
                        <div className="flex flex-col sm:flex-row gap-4 justify-center">
                            <Button size="lg" className="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 text-lg">
                                Book Now
                            </Button>
                            <Button size="lg" variant="outline" className="border-white text-white hover:bg-white hover:text-blue-600 px-8 py-3 text-lg">
                                Contact Us
                            </Button>
                        </div>
                    </div>
                </section>

                {/* Footer */}
                <footer id="contact" className="bg-gray-900 text-white py-12">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
                            <div>
                                <h3 className="text-2xl font-bold text-blue-400 mb-4">MDR Tours</h3>
                                <p className="text-gray-400">
                                    Creating unforgettable travel experiences since 2020. 
                                    Your trusted partner in exploration.
                                </p>
                            </div>
                            <div>
                                <h4 className="font-semibold mb-4">Quick Links</h4>
                                <ul className="space-y-2 text-gray-400">
                                    <li><a href="#" className="hover:text-white">About Us</a></li>
                                    <li><a href="#" className="hover:text-white">Packages</a></li>
                                    <li><a href="#" className="hover:text-white">Gallery</a></li>
                                    <li><a href="#" className="hover:text-white">Contact</a></li>
                                </ul>
                            </div>
                            <div>
                                <h4 className="font-semibold mb-4">Destinations</h4>
                                <ul className="space-y-2 text-gray-400">
                                    <li><a href="#" className="hover:text-white">Asia</a></li>
                                    <li><a href="#" className="hover:text-white">Europe</a></li>
                                    <li><a href="#" className="hover:text-white">America</a></li>
                                    <li><a href="#" className="hover:text-white">Africa</a></li>
                                </ul>
                            </div>
                            <div>
                                <h4 className="font-semibold mb-4">Contact Info</h4>
                                <div className="space-y-2 text-gray-400">
                                    <p>📧 info@mdrtours.com</p>
                                    <p>📞 +1 (555) 123-4567</p>
                                    <p>📍 123 Travel Street, Adventure City</p>
                                </div>
                            </div>
                        </div>
                        <div className="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                            <p>&copy; 2024 MDR Tours. All rights reserved.</p>
                        </div>
                    </div>
                </footer>
            </div>
        </>
    );
}