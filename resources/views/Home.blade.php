import Image from "next/image"
import Link from "next/link"
import { Search, MapPin, Clock, Briefcase } from "lucide-react"

export default function JobSearchPage() {
  return (
    <div className="flex flex-col min-h-screen">
      {/* Navigation Bar */}
      <header className="bg-black/80 text-white p-4">
        <div className="container mx-auto flex items-center justify-between">
          <div className="flex items-center gap-2">
            <div className="bg-white rounded p-1">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 7H4V19H20V7Z" fill="black" />
                <path d="M15 3H9V7H15V3Z" fill="black" />
              </svg>
            </div>
            <span className="font-bold">JobNow</span>
          </div>

          <nav className="hidden md:flex items-center gap-6">
            <Link href="#" className="text-white hover:text-gray-300">
              Home
            </Link>
            <Link href="#" className="text-white hover:text-gray-300">
              Jobs
            </Link>
            <Link href="#" className="text-white hover:text-gray-300">
              About Us
            </Link>
            <Link href="#" className="text-white hover:text-gray-300">
              Contact Us
            </Link>
          </nav>

          <div className="flex items-center gap-2">
            <Link href="#" className="text-white hover:text-gray-300">
              Login
            </Link>
            <Link href="#" className="bg-emerald-500 text-white px-4 py-1.5 rounded-md text-sm hover:bg-emerald-600">
              Register
            </Link>
          </div>
        </div>
      </header>

      <main>
        {/* Hero Section */}
        <section className="relative bg-gradient-to-r from-gray-900 to-gray-700 text-white py-16">
          <div className="absolute inset-0 bg-[url('/placeholder.svg?height=600&width=1200')] bg-cover bg-center opacity-30"></div>
          <div className="container mx-auto px-4 relative z-10">
            <div className="max-w-3xl mx-auto text-center mb-8">
              <h1 className="text-4xl md:text-5xl font-bold mb-2">Find Your Dream Job Today!</h1>
              <p className="text-lg">Connecting Talent with Opportunity: Your Gateway to Career Success</p>
            </div>

            <div className="bg-white rounded-lg p-2 flex flex-col md:flex-row">
              <div className="flex-1 p-2">
                <input
                  type="text"
                  placeholder="Job Title or Company"
                  className="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-500"
                />
              </div>
              <div className="flex-1 p-2">
                <select className="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-500 text-gray-500">
                  <option>Select Location</option>
                </select>
              </div>
              <div className="flex-1 p-2">
                <select className="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-emerald-500 text-gray-500">
                  <option>Select Category</option>
                </select>
              </div>
              <div className="p-2">
                <button className="bg-emerald-500 text-white px-4 py-2 rounded flex items-center gap-2 hover:bg-emerald-600">
                  <Search size={18} />
                  <span>Search Job</span>
                </button>
              </div>
            </div>
          </div>
        </section>

        {/* Company Logos */}
        <section className="py-8 bg-gray-100">
          <div className="container mx-auto px-4">
            <div className="flex flex-wrap justify-center items-center gap-8 md:gap-16">
              <div className="flex items-center gap-2">
                <div className="w-6 h-6 bg-black rounded-full"></div>
                <span className="font-bold">Spotify</span>
              </div>
              <div className="flex items-center gap-2">
                <div className="w-6 h-6 bg-black rounded-full"></div>
                <span className="font-bold">slack</span>
              </div>
              <div className="flex items-center gap-2">
                <div className="w-6 h-6 bg-black rounded-full"></div>
                <span className="font-bold">Adobe</span>
              </div>
              <div className="flex items-center gap-2">
                <div className="w-6 h-6 bg-black rounded-full"></div>
                <span className="font-bold">asana</span>
              </div>
              <div className="flex items-center gap-2">
                <div className="w-6 h-6 bg-black rounded-full"></div>
                <span className="font-bold">Linear</span>
              </div>
            </div>
          </div>
        </section>

        {/* Recent Jobs */}
        <section className="py-12">
          <div className="container mx-auto px-4">
            <div className="flex justify-between items-center mb-6">
              <h2 className="text-2xl font-bold">Recent Jobs Available</h2>
              <Link href="#" className="text-emerald-500 hover:underline">
                View all
              </Link>
            </div>
            <p className="text-gray-500 mb-8">All the latest premium handcrafted lorem ipsum sit amet adipisci.</p>

            <div className="space-y-6">
              {/* Job Card 1 */}
              <div className="border rounded-lg p-6 hover:shadow-md transition-shadow">
                <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                  <div className="flex gap-4">
                    <div className="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                      <div className="w-8 h-8 bg-red-500 rounded-full"></div>
                    </div>
                    <div>
                      <h3 className="font-bold text-lg">Forward Security Director</h3>
                      <p className="text-gray-500">Spotify, Telegram and Discord Inc</p>
                      <div className="flex flex-wrap gap-4 mt-2">
                        <div className="flex items-center gap-1 text-gray-500">
                          <Briefcase size={16} className="text-emerald-500" />
                          <span>Finance & Tourism</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <Clock size={16} className="text-emerald-500" />
                          <span>Full Time</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <span className="text-emerald-500">$</span>
                          <span>$30000</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <MapPin size={16} className="text-emerald-500" />
                          <span>New York, USA</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="flex items-center gap-4">
                    <span className="text-xs text-emerald-500">10 min ago</span>
                    <button className="bg-emerald-500 text-white px-4 py-1.5 rounded text-sm hover:bg-emerald-600">
                      Job Details
                    </button>
                  </div>
                </div>
              </div>

              {/* Job Card 2 */}
              <div className="border rounded-lg p-6 hover:shadow-md transition-shadow">
                <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                  <div className="flex gap-4">
                    <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                      <div className="w-8 h-8 bg-blue-500 rounded-full"></div>
                    </div>
                    <div>
                      <h3 className="font-bold text-lg">Full stack Developper</h3>
                      <p className="text-gray-500">Lark Software BOOT</p>
                      <div className="flex flex-wrap gap-4 mt-2">
                        <div className="flex items-center gap-1 text-gray-500">
                          <Briefcase size={16} className="text-emerald-500" />
                          <span>Computer Science</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <Clock size={16} className="text-emerald-500" />
                          <span>Part Time</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <span className="text-emerald-500">$</span>
                          <span>$25000</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <MapPin size={16} className="text-emerald-500" />
                          <span>Los Angeles, USA</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="flex items-center gap-4">
                    <span className="text-xs text-emerald-500">15 min ago</span>
                    <button className="bg-emerald-500 text-white px-4 py-1.5 rounded text-sm hover:bg-emerald-600">
                      Job Details
                    </button>
                  </div>
                </div>
              </div>

              {/* Job Card 3 */}
              <div className="border rounded-lg p-6 hover:shadow-md transition-shadow">
                <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                  <div className="flex gap-4">
                    <div className="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                      <div className="w-8 h-8 bg-green-500 rounded-full"></div>
                    </div>
                    <div>
                      <h3 className="font-bold text-lg">ServiceNow Developper</h3>
                      <p className="text-gray-500">SERVICENOW</p>
                      <div className="flex flex-wrap gap-4 mt-2">
                        <div className="flex items-center gap-1 text-gray-500">
                          <Briefcase size={16} className="text-emerald-500" />
                          <span>Computer Science</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <Clock size={16} className="text-emerald-500" />
                          <span>Full-time</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <span className="text-emerald-500">$</span>
                          <span>$46000</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <MapPin size={16} className="text-emerald-500" />
                          <span>Lyon, France</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="flex items-center gap-4">
                    <span className="text-xs text-emerald-500">15 min ago</span>
                    <button className="bg-emerald-500 text-white px-4 py-1.5 rounded text-sm hover:bg-emerald-600">
                      Job Details
                    </button>
                  </div>
                </div>
              </div>

              {/* Job Card 4 */}
              <div className="border rounded-lg p-6 hover:shadow-md transition-shadow">
                <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                  <div className="flex gap-4">
                    <div className="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                      <div className="w-8 h-8 bg-yellow-500 rounded-full"></div>
                    </div>
                    <div>
                      <h3 className="font-bold text-lg">District Intranet Director</h3>
                      <p className="text-gray-500">GoldSachs - Wallet Inc</p>
                      <div className="flex flex-wrap gap-4 mt-2">
                        <div className="flex items-center gap-1 text-gray-500">
                          <Briefcase size={16} className="text-emerald-500" />
                          <span>Commerce</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <Clock size={16} className="text-emerald-500" />
                          <span>Full Time</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <span className="text-emerald-500">$</span>
                          <span>$35000</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <MapPin size={16} className="text-emerald-500" />
                          <span>Florida, USA</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="flex items-center gap-4">
                    <span className="text-xs text-emerald-500">25 min ago</span>
                    <button className="bg-emerald-500 text-white px-4 py-1.5 rounded text-sm hover:bg-emerald-600">
                      Job Details
                    </button>
                  </div>
                </div>
              </div>

              {/* Job Card 5 */}
              <div className="border rounded-lg p-6 hover:shadow-md transition-shadow">
                <div className="flex flex-col md:flex-row md:items-center justify-between gap-4">
                  <div className="flex gap-4">
                    <div className="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                      <div className="w-8 h-8 bg-purple-500 rounded-full"></div>
                    </div>
                    <div>
                      <h3 className="font-bold text-lg">Corporate Tactics Facilitator</h3>
                      <p className="text-gray-500">Channel, Twitch and Vimeo Inc</p>
                      <div className="flex flex-wrap gap-4 mt-2">
                        <div className="flex items-center gap-1 text-gray-500">
                          <Briefcase size={16} className="text-emerald-500" />
                          <span>Commerce</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <Clock size={16} className="text-emerald-500" />
                          <span>Full-time</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <span className="text-emerald-500">$</span>
                          <span>$38000</span>
                        </div>
                        <div className="flex items-center gap-1 text-gray-500">
                          <MapPin size={16} className="text-emerald-500" />
                          <span>Boston, USA</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="flex items-center gap-4">
                    <span className="text-xs text-emerald-500">30 min ago</span>
                    <button className="bg-emerald-500 text-white px-4 py-1.5 rounded text-sm hover:bg-emerald-600">
                      Job Details
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Good Life Section */}
        <section className="py-12 bg-gray-100">
          <div className="container mx-auto px-4">
            <div className="max-w-3xl mx-auto">
              <div className="text-center mb-8">
                <h2 className="text-3xl font-bold mb-4">
                  Good Life Begins With
                  <br />A Good Company
                </h2>
                <p className="text-gray-600 mb-6">
                  All the latest premium handcrafted lorem ipsum sit amet adipisci. Vivamus eget feugiat felis. Donec
                  eget risus dignissim, aliquet felis vitae, dignissim erat. Vestibulum ante ipsum primis in faucibus
                  orci luctus et ultrices posuere cubilia Curae; Fusce id ipsum in massa elementum congue. Fucilius in
                  faucibus orci luctus et ultrices.
                </p>
                <div className="flex flex-col sm:flex-row justify-center gap-4">
                  <button className="bg-emerald-500 text-white px-6 py-2 rounded hover:bg-emerald-600">Sign Up</button>
                  <button className="text-emerald-500 hover:underline">Learn more</button>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Stats Section */}
        <section className="py-12">
          <div className="container mx-auto px-4">
            <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
              <div className="text-center">
                <h3 className="text-2xl font-bold text-emerald-500 mb-2">12k+</h3>
                <p className="font-bold mb-2">Clients worldwide</p>
                <p className="text-gray-500 text-sm">
                  All the latest premium handcrafted amet adipisci. Vivamus a massa. Donec a massa sit amet adipisci.
                </p>
              </div>
              <div className="text-center">
                <h3 className="text-2xl font-bold text-emerald-500 mb-2">20k+</h3>
                <p className="font-bold mb-2">Active resumes</p>
                <p className="text-gray-500 text-sm">
                  All the latest premium handcrafted amet adipisci. Vivamus a massa. Donec a massa sit amet adipisci.
                </p>
              </div>
              <div className="text-center">
                <h3 className="text-2xl font-bold text-emerald-500 mb-2">18k+</h3>
                <p className="font-bold mb-2">Companies</p>
                <p className="text-gray-500 text-sm">
                  All the latest premium handcrafted amet adipisci. Vivamus a massa. Donec a massa sit amet adipisci.
                </p>
              </div>
            </div>
          </div>
        </section>

        {/* Create Better Future Section */}
        <section className="py-12 bg-gray-100">
          <div className="container mx-auto px-4">
            <div className="grid md:grid-cols-2 gap-8 items-center">
              <div className="bg-black text-white p-8 rounded-lg">
                <h2 className="text-3xl font-bold mb-4">
                  Create A Better
                  <br />
                  Future For Yourself
                </h2>
                <p className="text-gray-300 mb-6">
                  All the latest premium handcrafted amet adipisci. Vivamus a massa sit amet adipisci. Fusce id ipsum in
                  massa elementum congue.
                </p>
                <button className="bg-emerald-500 text-white px-6 py-2 rounded hover:bg-emerald-600">Sign Up</button>
              </div>
              <div>
                <Image
                  src="/placeholder.svg?height=400&width=600"
                  alt="People working together"
                  width={600}
                  height={400}
                  className="rounded-lg"
                />
              </div>
            </div>
          </div>
        </section>

        {/* Testimonials */}
        <section className="py-12">
          <div className="container mx-auto px-4">
            <div className="text-center mb-8">
              <h2 className="text-3xl font-bold mb-2">Testimonials from Our Cuctomers</h2>
              <p className="text-gray-500">
                All the latest premium handcrafted amet locus ut amet adipisci. Blandit a massa elementum id...
              </p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
              {/* Testimonial 1 */}
              <div className="border rounded-lg p-6">
                <div className="flex mb-4">
                  {[1, 2, 3, 4, 5].map((star) => (
                    <svg key={star} className="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                      <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                    </svg>
                  ))}
                </div>
                <h3 className="font-bold text-lg mb-2">Amazing services</h3>
                <p className="text-gray-500 mb-4">
                  Vivamus feugiat non dolor ut tempor. Aliquam feugiat felis vitae, dignissim erat. Vestibulum ante
                  ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id ipsum in massa
                  elementum congue.
                </p>
                <div className="flex items-center gap-3">
                  <div className="w-10 h-10 bg-gray-300 rounded-full"></div>
                  <div>
                    <p className="font-medium">Marco Etter</p>
                    <p className="text-gray-500 text-sm">Happy Client</p>
                  </div>
                </div>
                <div className="text-emerald-500 text-4xl mt-4">"</div>
              </div>

              {/* Testimonial 2 */}
              <div className="border rounded-lg p-6">
                <div className="flex mb-4">
                  {[1, 2, 3, 4, 5].map((star) => (
                    <svg key={star} className="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                      <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                    </svg>
                  ))}
                </div>
                <h3 className="font-bold text-lg mb-2">Everything simple</h3>
                <p className="text-gray-500 mb-4">
                  Fusce id ipsum in massa elementum congue. Vivamus feugiat non dolor ut tempor. Aliquam feugiat felis
                  vitae, dignissim erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                  cubilia.
                </p>
                <div className="flex items-center gap-3">
                  <div className="w-10 h-10 bg-gray-300 rounded-full"></div>
                  <div>
                    <p className="font-medium">Kristin Hoeller</p>
                    <p className="text-gray-500 text-sm">Happy Client</p>
                  </div>
                </div>
                <div className="text-emerald-500 text-4xl mt-4">"</div>
              </div>

              {/* Testimonial 3 */}
              <div className="border rounded-lg p-6">
                <div className="flex mb-4">
                  {[1, 2, 3, 4, 5].map((star) => (
                    <svg key={star} className="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                      <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                    </svg>
                  ))}
                </div>
                <h3 className="font-bold text-lg mb-2">Awesome, thank you!</h3>
                <p className="text-gray-500 mb-4">
                  Aliquam feugiat felis vitae, dignissim erat. Vestibulum ante ipsum primis in faucibus orci luctus et
                  ultrices posuere cubilia Curae; Fusce id ipsum in massa elementum congue. Vivamus feugiat non dolor ut
                  tempor.
                </p>
                <div className="flex items-center gap-3">
                  <div className="w-10 h-10 bg-gray-300 rounded-full"></div>
                  <div>
                    <p className="font-medium">Zoe Clemens</p>
                    <p className="text-gray-500 text-sm">Happy Client</p>
                  </div>
                </div>
                <div className="text-emerald-500 text-4xl mt-4">"</div>
              </div>
            </div>
          </div>
        </section>
      </main>

      {/* Footer */}
      <footer className="bg-gray-100 pt-12 pb-6">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div>
              <h3 className="font-bold mb-4">Job</h3>
              <p className="text-gray-500 text-sm">
                Quis enim pellentesque viverra tellus eget molestunde facilisis. Campus vestibulum adipisci amet mauris
                ac.
              </p>
            </div>
            <div>
              <h3 className="font-bold mb-4">Company</h3>
              <ul className="space-y-2 text-sm text-gray-500">
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    About Us
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    Blog
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    Partners
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    For Companies
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    Contact
                  </Link>
                </li>
              </ul>
            </div>
            <div>
              <h3 className="font-bold mb-4">Job Categories</h3>
              <ul className="space-y-2 text-sm text-gray-500">
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    Human resources
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    Marketing
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    Construction
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    Education
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-emerald-500">
                    Financial Services
                  </Link>
                </li>
              </ul>
            </div>
            <div>
              <h3 className="font-bold mb-4">Newsletter</h3>
              <p className="text-gray-500 text-sm mb-4">Subscribe to our newsletter to get the latest jobs posted</p>
              <div className="flex">
                <input
                  type="email"
                  placeholder="Email Address"
                  className="flex-1 p-2 border rounded-l focus:outline-none focus:ring-2 focus:ring-emerald-500"
                />
                <button className="bg-emerald-500 text-white px-4 py-2 rounded-r hover:bg-emerald-600">
                  Subscribe now
                </button>
              </div>
            </div>
          </div>
          <div className="border-t pt-6 flex flex-col md:flex-row justify-between items-center">
            <p className="text-gray-500 text-sm">© Copyright JobNow, 2023</p>
            <div className="flex gap-4 text-sm">
              <Link href="#" className="text-gray-500 hover:text-emerald-500">
                Privacy Policy
              </Link>
              <Link href="#" className="text-gray-500 hover:text-emerald-500">
                Terms & Conditions
              </Link>
            </div>
          </div>
        </div>
      </footer>
    </div>
  )
}

