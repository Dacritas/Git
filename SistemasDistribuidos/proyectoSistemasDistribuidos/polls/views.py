from django.http import HttpResponse
from rest_framework.decorators import api_view
from rest_framework.response import Response
from rest_framework import status
from django.http import JsonResponse
import json

@api_view(["POST"])

def Suma(numeros):
    try:
        num = json.load(numeros.body)
        num = str(num)
        separar = list(map(int, str(num)))
        suma = separar[0]+separar[1]
        suma = str(suma)
        return  JsonResponse("La suma de los números es: "+ suma, safe=False)
    except ValueError as e:
        return Response(e.args[0],status.HTTP_400_BAD_REQUEST)

def index(request):
    return HttpResponse("Hello, world. You're at the polls index. Zero mod")

def detail(request, question_id):
    return HttpResponse("You're looking at question %s." % question_id)

def results(request, question_id):
    response = "You're looking at the results of question %s."
    return HttpResponse(response % question_id)

def vote(request, question_id):
    return HttpResponse("You're voting on question %s." % question_id)

