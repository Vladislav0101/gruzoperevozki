export default (id) => {
  const scrollToY = document.getElementById(id).offsetTop - 100
  window.scrollTo({ top: scrollToY, behavior: 'smooth' })
}
