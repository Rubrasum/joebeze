<template>
    <header class="bg-white">
        <div id="nav_container" class="nav_container h-24 flex items-center items-center justify-center" x-data="{ open: false }">
            <a href="/">
                <SpecialLogo />
            </a>
            <div class="container mx-auto px-4 h-full z-[99]">
                <nav class="h-full flex justify-between items-center py-4">
                    <div id="Logo container placeholder" class="w-full">
                        <div class="block z-[110] max-w-[33.85vw]"></div>
                    </div>
                    <div class="hidden lg:flex items-center">
                        <div class="relative mr-4">
                            <x-categories.dropdown :post="$post ?? null"/>
                        </div>
                        <div x-data="{ search: '{{ request('search') }}', category: '{{ request('category') }}' }">
                            <form method="GET" action="#" x-ref="form">
                                @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                <input type="search"
                                       name="search"
                                       placeholder="Search"
                                       class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                       x-model="search"
                                       x-on:search="if (!search) $refs.form.submit()"
                                       value="{{ request('search') }}"
                                >
                            </form>
                        </div>
                    </div>
                    <div class="lg:hidden">
                        <button @click="open = !open"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white bg-gray-800 border-2 border-gray-300"
                                aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </nav>

                <div x-show="open" class="lg:hidden" id="mobile-menu">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <div class="absolute lg:relative mb-4 top-[4.25rem] right-[0.3rem]">
                            <x-categories.dropdown :post="$post ?? null"/>
                        </div>
                        <div class="absolute lg:relative top-[6.5rem] right-[1rem]">
                            <form method="GET" action="#">
                                @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                <input type="text"
                                       name="search"
                                       placeholder="Search"
                                       class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                       value="{{ request('search') }}"
                                >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import Logo from '@/Components/Logo.vue';

    class Particle {
        constructor(x, y, size, color) {
            this.speed = 0.6;
            this.x = x;
            this.y = y;
            this.vx = (Math.random() - 0.5) * this.speed;
            this.vy = (Math.random() - 0.5) * this.speed;
            this.opacity = 1;
            this.size = size;
            this.color = color;
        }

        draw(context) {
            this.opacity -= this.speed / 200;
            context.fillStyle = this.color.replace('rgb', 'rgba').replace(')', `, ${this.opacity})`);
            context.beginPath();
            context.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            context.fill();
        }

        move() {
            this.x += this.vx;
            this.y += this.vy + (1 - this.opacity) * this.speed;
        }
    }

    class Laser {
        constructor(x, y) {
            this.x = x;
            this.y = y;
            this.steps = [];
            this.particles = [];
            this.sparkParticles = [];
        }

        drawTo(x, y, ctx) {
            ctx.beginPath();
            ctx.moveTo(this.x, this.y);
            ctx.lineTo(x, y);
            ctx.stroke();
            ctx.fillStyle = "red";
            ctx.fillRect(x + 12, y + 10, 5, 5); // Adjust the position of the dot
        }

        drawEnd(ctx) {
            var p = this.steps.shift();
            if (p !== undefined) {
                this.drawTo(p[0], p[1], ctx);
                this.generateSparkParticles(p[0], p[1]);
            } else {
                var index = this.particles.length;
                while (index--) {
                    var p = this.particles[index];
                    p.move();
                    if (p.opacity < 0 || p.x < 0 || p.x > ctx.canvas.width || p.y < 0 || p.y > ctx.canvas.height) {
                        this.particles.splice(index, 1);
                    } else {
                        p.draw(ctx);
                    }
                }

                var sparkIndex = this.sparkParticles.length;
                while (sparkIndex--) {
                    var sparkParticle = this.sparkParticles[sparkIndex];
                    sparkParticle.move();
                    if (sparkParticle.opacity < 0 || sparkParticle.x < 0 || sparkParticle.x > ctx.canvas.width || sparkParticle.y < 0 || sparkParticle.y > ctx.canvas.height) {
                        this.sparkParticles.splice(sparkIndex, 1);
                    } else {
                        sparkParticle.draw(ctx);
                    }
                }
            }
        }

        endFrom(x0, y0) {
            var nrOfSteps = 800;
            var i = nrOfSteps;
            while (i--) {
                var x = this.x + i * (x0 - this.x) / nrOfSteps + Math.cos(i / 10) * i / 4;
                var y = this.y + i * (y0 - this.y) / nrOfSteps + Math.sin(i / 10) * i / 4;
                this.steps.push([x, y]);
                if (i < 100) {
                    this.particles.push(new Particle(x, y, 2, 'rgb(0, 255, 0)'));
                }
            }
        }

        generateSparkParticles(x, y) {
            var numSparkParticles = 10;
            for (var i = 0; i < numSparkParticles; i++) {
                var size = Math.random() * 3 + 1;
                var sparkParticle = new Particle(x, y, size, 'rgb(255, 255, 0)');
                sparkParticle.vx = (Math.random() - 0.5) * 2;
                sparkParticle.vy = (Math.random() - 0.5) * 2;
                this.sparkParticles.push(sparkParticle);
            }
        }
    }


    class LaserWriter {
        constructor(canvasId, canvas2Id, svgId) {
            var canvas = document.getElementById(canvasId);
            var canvas2 = document.getElementById(canvas2Id);
            this.svg = document.getElementById(svgId);
            this.ctx = canvas.getContext("2d");
            this.ctx2 = canvas2.getContext("2d");
            this.tick = 0;
            this.pathIndex = 0;
            this.pointIndex = 0;
            this.paths = [];
            this.size = 3;
            this.initCanvasSize();
        }


        initCanvasSize() {
            const viewBox = this.svg.viewBox.baseVal;
            const scaleFactor = window.devicePixelRatio || 1;

            this.w = viewBox.width * scaleFactor;
            this.h = viewBox.height * scaleFactor;

            this.ctx.canvas.width = this.w;
            this.ctx.canvas.height = this.h;
            this.ctx2.canvas.width = this.w;
            this.ctx2.canvas.height = this.h;
        }

        init(text, size) {
            // Set font size for the text
            this.ctx.font = `${size}px nasalisation`;
            // Calculate starting X position to center the text
            this.startX = (this.w - this.ctx.measureText(text).width) / 2;
            // Draw text onto the canvas
            this.ctx.fillText(text, this.startX, 100);

            // Get the imageData of the text
            var image = this.ctx.getImageData(0, 0, this.w, this.h);
            var buffer32 = new Uint32Array(image.data.buffer);

            // Clear the canvas after getting the image data
            this.ctx.clearRect(0, 0, this.w, this.h);

            // Set the laser beam styles
            this.ctx2.strokeStyle = "rgba(20, 255, 70, 1)";
            this.ctx2.lineCap = "round";
            this.ctx2.lineWidth = 4;

            // Find the top-left non-zero pixel to set the laser start position
            let startX = this.w, startY = this.h; // Initialize with max values
            for (let y = 0; y < this.h; y++) {
                for (let x = 0; x < this.w; x++) {
                    if (buffer32[y * this.w + x]) {
                        startX = Math.min(startX, x);
                        startY = Math.min(startY, y);
                    }
                }
            }

            // Initialize the laser at the top-left of the text
            this.laserStart.x = startX;
            this.laserStart.y = startY;
            this.laser = new Laser(this.laserStart.x, this.laserStart.y);
            // Iterate over every pixel to find where the text is drawn
            for (var y = 0; y < this.h; y++) {
                for (var x = 0; x < this.w; x++) {
                    if (buffer32[y * this.w + x]) {
                        this.points.push([x, y]);
                    }
                }
            }
        }

        draw() {
            this.ctx2.clearRect(0, 0, this.w, this.h);

            if (this.pathIndex < this.paths.length - 1) {
                const path = this.paths[this.pathIndex];
                const p = path.points[this.pointIndex];

                if (p) {
                    this.x = p[0];
                    this.y = p[1];
                    this.laser.drawTo(this.x, this.y, this.ctx2);

                    const segmentLength = path.path.getTotalLength() / path.points.length;
                    const distance = this.pointIndex * segmentLength;
                    path.path.style.strokeDasharray = `${distance} ${path.path.getTotalLength()}`;
                    path.path.style.stroke = '#fff';
                    path.path.style.strokeWidth = '2px';
                }

                if (this.pointIndex === path.points.length - 1) {
                    this.pathIndex++;
                    this.pointIndex = 0;
                } else if (this.pointIndex > path.points.length) {
                    this.pointIndex = path.points.length - 1;
                } else {
                    this.pointIndex += 6.5;
                }
            } else if (this.pathIndex === this.paths.length - 1) {
                const borderPath = this.paths[this.pathIndex];
                const p = borderPath.points[this.pointIndex];

                if (p) {
                    this.x = p[0];
                    this.y = p[1];
                    this.laser.drawTo(this.x, this.y, this.ctx2);
                }

                if (this.pointIndex === borderPath.points.length - 1) {
                    this.pathIndex++;
                    this.pointIndex = 0;
                } else {
                    this.pointIndex++;
                }
            } else if (this.pathIndex === this.paths.length) {
                this.laser.endFrom(this.x, this.y);

                this.pathIndex++;
            } else {
                this.laser.drawEnd(this.ctx2);
            }

            if (this.pathIndex <= this.paths.length) {
                requestAnimationFrame(() => this.draw());
            }
        }

        traceBorder() {
            const logoBackground = document.getElementById('logo-background');
            const logoBackgroundRect = logoBackground.getBoundingClientRect();

            const borderPoints = [
                [logoBackgroundRect.left, logoBackgroundRect.top],
                [logoBackgroundRect.right, logoBackgroundRect.top],
                [logoBackgroundRect.right, logoBackgroundRect.bottom],
                [logoBackgroundRect.left, logoBackgroundRect.bottom],
                [logoBackgroundRect.left, logoBackgroundRect.top]
            ];

            const borderPath = {
                points: borderPoints
            };

            this.paths.push(borderPath);
        }

        traceSVG() {
            const paths = this.svg.querySelectorAll('path');
            paths.forEach(path => {
                path.style.stroke = 'transparent';
                path.style.fill = 'transparent'; // Set initial fill to transparent
                const pathPoints = [];
                const length = path.getTotalLength();
                const numPoints = Math.floor(length); // Increase the number of points
                for (let i = 0; i < numPoints; i++) {
                    const point = path.getPointAtLength(i * length / (numPoints - 1));
                    pathPoints.push([point.x, point.y]);
                }
                this.paths.push({path, points: pathPoints});
            });

            this.laser = new Laser(this.paths[0].points[0][0], this.paths[0].points[0][1]);
        }
    }
    var lastMousePosition = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
    document.addEventListener('mousemove', (event) => {
        lastMousePosition.x = event.clientX;
        lastMousePosition.y = event.clientY;
        // console.log("lastx: " + lastMousePosition.x + " lasty: " + lastMousePosition.y);
    });

    // delay til page load
    document.addEventListener("DOMContentLoaded", () => {

        // mainly for the image optimization. 1024 is tailwinds lg.
        const breakpoints = [
            { width: 2560, suffix: '-2560' },
            { width: 1920, suffix: '-1920' },
            { width: 1600, suffix: '-1600' },
            { width: 1200, suffix: '-1200' },
            { width: 1024, suffix: '-1024' },
            { width: 834, suffix: '-834' },
            { width: 600, suffix: '-600' },
            { width: 414, suffix: '-414' },
            { width: 360, suffix: '-360' },
            { width: 320, suffix: '-320' }
        ];


        const imagesInfo = [
            {
                id: "redhead",
                baseName: "{{ asset('images/animated-logo/redhead') }}"
            },
            {
                id: "blueninja",
                baseName: "{{ asset('images/animated-logo/blue-ninja') }}"
            },
            {
                id: "blackcat",
                baseName: "{{ asset('images/animated-logo/black-cat') }}"
            },
            {
                id: "tanwoman",
                baseName: "{{ asset('images/animated-logo/tan-woman') }}"
            },
            {
                id: "orangewoman",
                baseName: "{{ asset('images/animated-logo/orange-woman') }}"
            }
        ];

        let image_index = 0;
        let old_width = window.innerWidth;
        // this dies on resize, then reruns.
        // this is recursive to load all the images for the logo svg slowly
        function loadNextImage() {
            if (image_index < imagesInfo.length) {
                const imageElement = document.getElementById(imagesInfo[image_index].id);
                if (imageElement) {
                    const screenWidth = window.innerWidth;
                    if (old_width !== screenWidth) {
                        return;
                    }
                    const breakpoint = breakpoints.find(bp => screenWidth >= bp.width);

                    const suffix = breakpoint ? breakpoint.suffix : '';
                    const fileName = `${imagesInfo[image_index].baseName}${suffix}.jpg`;
                    imageElement.setAttributeNS('http://www.w3.org/1999/xlink', 'href', fileName);
                    console.log("loading image: " + fileName);
                    image_index++;
                    setTimeout(loadNextImage, 7500); // Wait for 7.5 seconds before loading the next image
                } else {
                    image_index = 0
                }
            }
        }
        loadNextImage(); // first run

        // On resize, load the images
        window.addEventListener('resize', () => {
            old_width = window.innerWidth;
            image_index = 0;
            loadNextImage();
        });

        let currentIndex = 0;

        function animateCircle() {
            const circles = document.querySelectorAll('circle.cls-3-2');

            if (circles.length === 0) return;

            // get previous index
            const prevIndex = currentIndex === 0 ? circles.length - 1 : currentIndex - 1;
            const circle = circles[currentIndex];

            // Get the bounding rectangle of the SVG element
            const svgRect = document.getElementById('joebeze_logo_lazer_anim').getBoundingClientRect();
            const margin = parseFloat(getComputedStyle(document.getElementById('logo-container')).marginLeft);
            const svgRippleRect = document.getElementById('ripple-effect-bg').getBoundingClientRect();
            const viewBox = document.getElementById('joebeze_logo_lazer_anim').viewBox.baseVal;

            // Calculate the scale factors based on the viewBox dimensions
            const scaleX = svgRect.width / viewBox.width;
            const scaleY = svgRect.height / viewBox.height;

            // Calculate the mouse position relative to the SVG's viewBox coordinates
            const svgX = lastMousePosition.x - 60 > 1200 ? 1200 : lastMousePosition.x - 50;
            const svgY = lastMousePosition.y + (svgRippleRect.height/2) - 10 > 800 ? 800 : lastMousePosition.y + (svgRippleRect.height/2) - 10;

            // Adjust the position to align with the pointer finger
            const adjustedSvgX = svgX;
            const adjustedSvgY = svgY;

            // Put a small dot on the same location that is upper level and 100% visible
            // const dot = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
            // dot.setAttribute('cx', adjustedSvgX);
            // dot.setAttribute('cy', adjustedSvgY);
            // dot.setAttribute('r', '1');
            // dot.setAttribute('fill', 'white');
            // dot.setAttribute('stroke', 'white');
            // dot.setAttribute('stroke-width', '1');
            // dot.style.transition = 'r 1s';
            // document.getElementById('joebeze_logo_lazer_anim').appendChild(dot);


            // Start expanding without transition for position change
            setTimeout(() => {
                //change location of circles
                circle.setAttribute('cx', adjustedSvgX);
                circle.setAttribute('cy', adjustedSvgY);
                circle.style.transition = 'r 29s';
                const viewportWidth = window.innerWidth;
                const radius = (2500 / 1920) * viewportWidth;
                // Set the radius attribute
                circle.setAttribute('r', radius.toString());

                circle.setAttribute('r', '286.46vw');  // Use 2500 for half of 5000 to simulate radius expansion
            }, 10);

            // Reset all circles
            circles.forEach((c, index) => {
                lastIndex = (currentIndex - 1) % circles.length;
                if (index === currentIndex) {
                    c.style.zIndex = '19';
                } else if (index === lastIndex) {
                    c.setAttribute('cx', adjustedSvgX);
                    c.setAttribute('cy', adjustedSvgY);
                    c.style.zIndex = '18';
                } else {
                    c.setAttribute('cx', adjustedSvgX);
                    c.setAttribute('cy', adjustedSvgY);
                    c.style.transition = 'r 1s';
                    c.setAttribute('r', '0.1');
                    c.style.zIndex = '17';
                }

            });

            // set z-index of current circle to 89 and previous circle to 88
            circle.style.zIndex = '19';
            circles[prevIndex].style.zIndex = '18';

            currentIndex = (currentIndex + 1) % circles.length;
        }

        setTimeout(animateCircle, 10500)

        // Start the animation cycle
        setInterval(animateCircle, 20500);


        // Randomly choose between the images
        let options = [
            "{{ asset('images/Screenshot 2024-03-23 100050.jpg') }}",
            "{{ asset('images/noita-logo.gif') }}",
            "{{ asset('images/logo-bg-image-003.jpg') }}",
            "{{ asset('images/logo-bg-image-004.jpg') }}",
            "{{ asset('images/logo-bg-image-006.jpg') }}",
            "{{ asset('images/logo-bg-image-007.jpg') }}"
        ];// Set the background to the random image


        // Pick a random index based on the length of the options array

        // Set initial fill for the filled logo
        document.querySelectorAll('#joebeze_logo_filled .cls-2-1').forEach(path => {
            path.style.fill = 'url(#tessPattern)';
        });

        // Fade out the background and filled logo
        setTimeout(() => {

            document.getElementById('logo-background').classList.add('fade-out');

            // add an animation to fade out the filled logo
            document.getElementById('joebeze_logo_filled').style.animation = 'fadeOut 2s ease-in-out forwards';
        }, 2000);

        // Fade in the laser animation
        setTimeout(() => {
            document.getElementById('joebeze_logo_lazer_anim').style.visibility = 'visible';
            const laserWriter = new LaserWriter("canvas", "canvas2", "joebeze_logo_lazer_anim");
            laserWriter.traceSVG();
            laserWriter.traceBorder();
            laserWriter.draw();
            // let rand = Math.floor(Math.random() * options.length);
            // let imageUrl = options[rand];
            // document.getElementById('logo-background').style.backgroundImage = `url('${imageUrl}')`;

        }, 4000);

        // Fade in the filled logo with the screenshot pattern and fade the background to the screenshot
        setTimeout(() => {
            document.querySelectorAll('#joebeze_logo_filled .cls-2-1').forEach(path => {
                path.style.fill = 'white';
            });
            document.getElementById('joebeze_logo_filled').style.visibility = 'visible';
            document.getElementById('joebeze_logo_filled').style.opacity = '1';
            // set animation
            document.getElementById('joebeze_logo_filled').style.animation = 'fadeIn 2s ease-in-out forwards';
        }, 11000);
        setTimeout(() => {
            const paths = document.querySelectorAll('#joebeze_logo_lazer_anim .cls-1');
            paths.forEach(path => {
                // Change the stroke color
                path.style.stroke = '#012'; // Change to your desired color
            });
            // Update #joebeze_logo_lazer_anim .cls-1 transition to stroke 1s ease
            paths.forEach(path => {
                path.style.transition = 'stroke 1s ease';
            });
        }, 13000);


        // Fade the filled logo to white
        // setTimeout(() => {
        //
        //     // Fix background color to show the image and be transparent
        //     document.getElementById('logo-background').style.backgroundColor = 'transparent';
        //
        //
        //     document.getElementById('logo-background').style.opacity = '1';
        //
        //
        //
        //     // Set up a timer to transition to the next image every 5 seconds
        //     let currentIndex = Math.floor(Math.random() * options.length);
        //     setInterval(() => {
        //         currentIndex = (currentIndex + 1) % options.length;
        //         let nextImageUrl = options[currentIndex];
        //
        //         // Transition to the next image over a 2-second duration
        //         document.getElementById('logo-background').style.transition = 'background-image 2s';
        //         document.getElementById('logo-background').style.backgroundImage = `url('${nextImageUrl}')`;
        //     }, 4000);
        //
        // }, 13000);


    });
</script>
