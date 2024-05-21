document.addEventListener('DOMContentLoaded', function () {
			const form = document.getElementById('form');
			form.addEventListener('submit', formSend);
			async function formSend(e) {
				e.preventDefault();
				let error = formValidate(form);
				let formData = new FormData(form);
				formData.append('image', formImage.files[0]);
				if (error === 0) {
					let response = await fetch('sendmail.php', {
						method: 'POST',
						body: formData
					});
					if (response.ok) {
						let result = await response.json();
						alert(result.message);
						formPreview.innerHTML = '';
						form.reset();
					} else {}
				} else {
					alert('Заполните обязательные поля');
				}
			}
}
