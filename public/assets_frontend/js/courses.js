const FilterForm = document.getElementById('filter-form');
const FilterSubj = FilterForm.filter_subject;
const FilterQual = FilterForm.filter_qualification;
const institution = FilterQual.dataset.institution;
const csrftoken = FilterForm.csrfmiddlewaretoken.value;

const C_CLS  = 'c-select-resetBtn'; // on parent of <select>

const urlQuery = new URLSearchParams(location.search);
const toggleResetBtn = el => el.parentElement.classList.toggle(C_CLS, el.value);

initSelect(FilterQual);
initSelect(FilterSubj);

FilterQual.onchange = () => {
    toggleResetBtn(FilterQual);
    if (institution) {
        updateSubjectOptions(FilterQual.value, institution);
    }
};

FilterSubj.onchange = () => {
    toggleResetBtn(FilterSubj);
};

FilterForm.onclick = ev => {
    var el = ev.target;
    if (el.classList.contains(C_CLS)) {
        el.querySelector('select').value = '';
        el.classList.remove(C_CLS);
        FilterForm.submit();
        FilterForm.filters.disabled = true;
    }
};

FilterForm.onchange = () => {
    FilterForm.submit();
    FilterForm.filters.disabled = true;
}

function initSelect(select) {
    select.value = urlQuery.get(select.name);
    if (!select.value) select.value = '';
    toggleResetBtn(select);
}

function updateSubjectOptions(qualification, institution) {
    const data = `qualification_id=${qualification}&institution_id=${institution}`;
    const xhr = new XMLHttpRequest();

    const isRequestDone = xhr => xhr.readyState == XMLHttpRequest.DONE;
    const isStatusSuccess = xhr => xhr.status == 200;
    const createOption = arr => `<option value="${arr[0]}">${arr[1]}</option>`;

    xhr.onreadystatechange = function() {
        if (isRequestDone(xhr) && isStatusSuccess(xhr)) {
            let resp = JSON.parse(xhr.responseText);
            let options = resp.subjects.map(createOption).join();
            FilterSubj.innerHTML = createOption(['', '']) + options;
        }
    };
    xhr.open("POST", "/api/populate-subject-data/");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader("X-CSRFToken", csrftoken);
    xhr.send(data);
}

