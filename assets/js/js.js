const image = document.getElementById('movingImage');

document.addEventListener('mousemove', (e) => {
  const mouseX = e.clientX;
  const mouseY = e.clientY;

  image.style.left = `${mouseX}px`;
  image.style.top = `${mouseY}px`;
});
