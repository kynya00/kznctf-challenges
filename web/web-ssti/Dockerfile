FROM tiangolo/meinheld-gunicorn-flask:python3.7-alpine3.8

RUN mkdir -p /app

WORKDIR /app
COPY ./app /app
COPY ./flag.txt /app
RUN pip install -r requirements.txt

EXPOSE 80
CMD ["flask", "run", "-h", "0.0.0.0", "-p", "80"]