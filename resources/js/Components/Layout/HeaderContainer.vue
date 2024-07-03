<template>
    <div className="bg-background relative border-b-2 border-secondary-bg" ref="containerRef">
        <div ref="p5Container" className="absolute inset-0 z-10"></div>
        <div ref="slotContainer" className="relative z-10">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted, onUnmounted, nextTick, watch} from 'vue';
import p5 from 'p5';

const containerRef = ref(null);
const p5Container = ref(null);
const slotContainer = ref(null);
let p5Instance = null;

const sketch = (p) => {
    let stars = [];
    const numStars = 1200;
    const maxSpeed = 50;
    let canvasWidth, canvasHeight;
    const zFar = 4000;
    const zNear = 1;

    p.setup = () => {
        canvasWidth = p5Container.value.offsetWidth;
        canvasHeight = p5Container.value.offsetHeight;
        p.createCanvas(canvasWidth, canvasHeight);
        for (let i = 0; i < numStars; i++) {
            stars.push(new Star(p));
        }
    };

    p.draw = () => {
        p.background(0);
        p.translate(canvasWidth / 2, canvasHeight / 2);
        for (let star of stars) {
            star.update();
            star.show();
        }
    };

    class Star {
        constructor() {
            this.resetStar();
        }

        resetStar() {
            this.x = p.random(-canvasWidth * 7, canvasWidth * 7);
            this.y = p.random(-canvasHeight * 7, canvasHeight * 7);
            this.z = p.random(zFar / 2, zFar);
            this.pz = this.z;
            this.speed = p.map(this.z, zFar, zNear, 1, maxSpeed);
        }

        update() {
            this.pz = this.z;
            this.z -= this.speed;
            if (this.z < zNear) {
                this.resetStar();
            }
        }

        show() {
            let sx = p.map(this.x / this.z, 0, 1, 0, canvasWidth * 0.5);
            let sy = p.map(this.y / this.z, 0, 1, 0, canvasHeight * 0.5);
            let px = p.map(this.x / this.pz, 0, 1, 0, canvasWidth * 0.5);
            let py = p.map(this.y / this.pz, 0, 1, 0, canvasHeight * 0.5);

            let size = p.map(this.z, zNear, zFar, 2, 0);
            let brightness = p.map(this.z, zNear, zFar, 255, 50);

            p.stroke(brightness);
            p.strokeWeight(size);

            p.line(px, py, sx, sy);
        }
    }

    p.windowResized = () => {
        canvasWidth = p5Container.value.offsetWidth;
        canvasHeight = p5Container.value.offsetHeight;
        p.resizeCanvas(canvasWidth, canvasHeight);
    };
};

onMounted(() => {
    nextTick(() => {
        p5Instance = new p5(sketch, p5Container.value);
    });
});

onUnmounted(() => {
    if (p5Instance) {
        p5Instance.remove();
    }
});

// Watch for changes in the slot content size
const resizeObserver = new ResizeObserver(() => {
    if (p5Instance) {
        p5Instance.windowResized();
    }
});

onMounted(() => {
    if (slotContainer.value) {
        resizeObserver.observe(slotContainer.value);
    }
});

onUnmounted(() => {
    resizeObserver.disconnect();
});
</script>

<style scoped>
.bg-background {
    width: 100%;
}
</style>
