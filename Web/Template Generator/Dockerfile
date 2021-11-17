FROM python:3.9-alpine

WORKDIR /usr/app
RUN python -m pip install --upgrade pip

COPY private/ .

RUN pip install -r requirements.txt


ENV FLASK_APP=run.py 
ENV FLASK_ENV=production

EXPOSE 5000/tcp
EXPOSE 5000/udp

ENTRYPOINT ["python"]

CMD ["run.py"]
